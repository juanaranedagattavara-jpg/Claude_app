<?php
/**
 * Performance Optimizations
 * 
 * @package SueñoAndino
 * @version 1.0.0
 * @requires PHP 8.2+
 * @tested up to PHP 8.2
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Limitar revisiones de posts
 */
if (!defined('WP_POST_REVISIONS')) {
    define('WP_POST_REVISIONS', 3);
}

/**
 * Deshabilitar emojis
 */
function sueno_andino_disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
}
add_action('init', 'sueno_andino_disable_emojis');

/**
 * Remover query strings de recursos estáticos
 */
function sueno_andino_remove_query_strings($src) {
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}
add_filter('script_loader_src', 'sueno_andino_remove_query_strings', 15, 1);
add_filter('style_loader_src', 'sueno_andino_remove_query_strings', 15, 1);

/**
 * Deshabilitar XML-RPC
 */
add_filter('xmlrpc_enabled', '__return_false');

/**
 * Remover meta tags innecesarios
 */
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');

/**
 * Optimizar base de datos
 */
function sueno_andino_optimize_database() {
    global $wpdb;
    
    // Limpiar revisiones antiguas
    $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_type = 'revision' AND post_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
    
    // Limpiar spam de comentarios
    $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_approved = 'spam' AND comment_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
    
    // Limpiar comentarios en papelera
    $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_approved = 'trash' AND comment_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
}
add_action('wp_scheduled_delete', 'sueno_andino_optimize_database');

/**
 * Agregar lazy loading a imágenes
 */
function sueno_andino_add_lazy_loading($content) {
    if (is_admin() || is_feed() || is_preview()) {
        return $content;
    }
    
    $content = preg_replace('/<img(.*?)src=/', '<img$1loading="lazy" src=', $content);
    return $content;
}
add_filter('the_content', 'sueno_andino_add_lazy_loading');

/**
 * Optimizar consultas de base de datos
 */
function sueno_andino_optimize_queries($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Optimizar consultas de posts
        if (is_home() || is_category() || is_tag()) {
            $query->set('posts_per_page', 12);
        }
    }
}
add_action('pre_get_posts', 'sueno_andino_optimize_queries');

/**
 * Comprimir HTML
 */
function sueno_andino_compress_html($buffer) {
    if (is_admin() || is_feed() || is_preview()) {
        return $buffer;
    }
    
    $buffer = preg_replace('/<!--(.|\s)*?-->/', '', $buffer);
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    $buffer = preg_replace('/>\s+</', '><', $buffer);
    
    return $buffer;
}

/**
 * Iniciar compresión de HTML
 */
function sueno_andino_start_html_compression() {
    if (!is_admin() && !is_feed() && !is_preview()) {
        ob_start('sueno_andino_compress_html');
    }
}
add_action('template_redirect', 'sueno_andino_start_html_compression');

/**
 * Preload recursos críticos
 */
function sueno_andino_preload_resources() {
    echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/critical.css" as="style">' . "\n";
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style">' . "\n";
}
add_action('wp_head', 'sueno_andino_preload_resources', 1);

/**
 * Deshabilitar pingbacks
 */
function sueno_andino_disable_pingbacks($methods) {
    unset($methods['pingback.ping']);
    return $methods;
}
add_filter('xmlrpc_methods', 'sueno_andino_disable_pingbacks');

/**
 * Optimizar heartbeat
 */
function sueno_andino_optimize_heartbeat($settings) {
    $settings['interval'] = 60; // Cambiar de 15 a 60 segundos
    return $settings;
}
add_filter('heartbeat_settings', 'sueno_andino_optimize_heartbeat');

/**
 * Limpiar cache de transients
 */
function sueno_andino_clean_transients() {
    global $wpdb;
    
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_%' AND option_value < UNIX_TIMESTAMP()");
    $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_%' AND option_name NOT IN (SELECT CONCAT('_transient_timeout_', SUBSTRING(option_name, 12)) FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_%')");
}
add_action('wp_scheduled_delete', 'sueno_andino_clean_transients');

/**
 * Agregar headers de cache
 */
function sueno_andino_add_cache_headers() {
    if (!is_admin()) {
        header('Cache-Control: public, max-age=31536000');
        header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 31536000) . ' GMT');
    }
}
add_action('template_redirect', 'sueno_andino_add_cache_headers');
