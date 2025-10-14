<?php
/**
 * Optimizaciones de rendimiento para Sueño Andino
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Optimizaciones de rendimiento
 */
function sueno_andino_performance_optimizations() {
    // Remover emojis si no son necesarios
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

    // Limpiar head
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);

    // Remover versiones de scripts y estilos
    add_filter('style_loader_src', 'sueno_andino_remove_version_scripts_styles', 9999);
    add_filter('script_loader_src', 'sueno_andino_remove_version_scripts_styles', 9999);

    // Deshabilitar XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');

    // Deshabilitar pingbacks
    add_filter('xmlrpc_methods', 'sueno_andino_remove_xmlrpc_pingback_ping');

    // Optimizar consultas de base de datos
    add_action('pre_get_posts', 'sueno_andino_optimize_queries');

    // Lazy loading para imágenes
    add_filter('wp_get_attachment_image_attributes', 'sueno_andino_add_lazy_loading', 10, 3);

    // Minificar HTML
    add_action('get_header', 'sueno_andino_start_html_minification');
    add_action('wp_footer', 'sueno_andino_end_html_minification', 999);

    // Preload de recursos críticos
    add_action('wp_head', 'sueno_andino_preload_critical_resources', 1);

    // Defer JavaScript no crítico
    add_filter('script_loader_tag', 'sueno_andino_defer_scripts', 10, 3);

    // Optimizar CSS
    add_action('wp_head', 'sueno_andino_inline_critical_css', 1);
}
add_action('init', 'sueno_andino_performance_optimizations');

/**
 * Remover versiones de scripts y estilos
 */
function sueno_andino_remove_version_scripts_styles($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

/**
 * Remover pingbacks de XML-RPC
 */
function sueno_andino_remove_xmlrpc_pingback_ping($methods) {
    unset($methods['pingback.ping']);
    return $methods;
}

/**
 * Optimizar consultas de base de datos
 */
function sueno_andino_optimize_queries($query) {
    if (!is_admin() && $query->is_main_query()) {
        // Limitar posts por página
        if (is_home() || is_archive()) {
            $query->set('posts_per_page', 12);
        }
        
        // Optimizar consultas de búsqueda
        if (is_search()) {
            $query->set('posts_per_page', 10);
        }
    }
}

/**
 * Agregar lazy loading a imágenes
 */
function sueno_andino_add_lazy_loading($attr, $attachment, $size) {
    if (!is_admin()) {
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }
    return $attr;
}

/**
 * Iniciar minificación de HTML
 */
function sueno_andino_start_html_minification() {
    ob_start('sueno_andino_minify_html');
}

/**
 * Finalizar minificación de HTML
 */
function sueno_andino_end_html_minification() {
    if (ob_get_length()) {
        ob_end_flush();
    }
}

/**
 * Minificar HTML
 */
function sueno_andino_minify_html($buffer) {
    // Solo minificar en frontend
    if (is_admin()) {
        return $buffer;
    }

    // Remover comentarios HTML
    $buffer = preg_replace('/<!--(?!\s*(?:\[if [^\]]+]|<!|>))(?:(?!-->).)*-->/s', '', $buffer);
    
    // Remover espacios en blanco innecesarios
    $buffer = preg_replace('/\s+/', ' ', $buffer);
    $buffer = preg_replace('/>\s+</', '><', $buffer);
    
    // Remover espacios al final de líneas
    $buffer = preg_replace('/\s+$/', '', $buffer);
    
    return $buffer;
}

/**
 * Preload de recursos críticos
 */
function sueno_andino_preload_critical_resources() {
    if (is_front_page()) {
        // Preload de fuentes críticas
        echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">';
        
        // Preload de imágenes críticas
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/img/hero-background.jpg" as="image">';
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/img/logo-sa-blanco.png" as="image">';
        
        // Preload de CSS crítico
        echo '<link rel="preload" href="' . get_template_directory_uri() . '/assets/css/premium.css" as="style">';
    }
}

/**
 * Defer JavaScript no crítico
 */
function sueno_andino_defer_scripts($tag, $handle, $src) {
    // Scripts que no necesitan defer
    $no_defer = array(
        'jquery',
        'wp-hooks',
        'wp-i18n',
        'wp-polyfill'
    );
    
    if (in_array($handle, $no_defer)) {
        return $tag;
    }
    
    // Agregar defer a scripts no críticos
    if (strpos($src, get_template_directory_uri()) !== false) {
        return str_replace('<script ', '<script defer ', $tag);
    }
    
    return $tag;
}

/**
 * CSS crítico inline
 */
function sueno_andino_inline_critical_css() {
    if (is_front_page()) {
        ?>
        <style id="critical-css">
        /* CSS crítico para above-the-fold */
        body { margin: 0; font-family: 'Inter', sans-serif; }
        .hero-optimized { min-height: 100vh; position: relative; }
        .hero-content { position: relative; z-index: 10; text-align: center; color: white; }
        .hero-title { font-family: 'Playfair Display', serif; font-weight: 800; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 2rem; }
        .btn { display: inline-block; text-decoration: none; border-radius: 0.5rem; }
        .btn-primary { background: linear-gradient(135deg, #d3600f 0%, #c16134 100%); color: white; }
        </style>
        <?php
    }
}

/**
 * Optimizar carga de fuentes
 */
function sueno_andino_optimize_fonts() {
    // Cargar fuentes de forma asíncrona
    add_action('wp_head', function() {
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
    }, 1);
}
add_action('init', 'sueno_andino_optimize_fonts');

/**
 * Optimizar imágenes
 */
function sueno_andino_optimize_images() {
    // Agregar atributos de optimización a imágenes
    add_filter('wp_get_attachment_image_attributes', function($attr, $attachment, $size) {
        if (!is_admin()) {
            $attr['loading'] = 'lazy';
            $attr['decoding'] = 'async';
            $attr['fetchpriority'] = 'auto';
        }
        return $attr;
    }, 10, 3);
}
add_action('init', 'sueno_andino_optimize_images');

/**
 * Cache de consultas
 */
function sueno_andino_cache_queries() {
    // Cache para consultas frecuentes
    add_action('wp_loaded', function() {
        if (!is_admin()) {
            // Cache para menús
            add_filter('wp_nav_menu', function($nav_menu, $args) {
                $cache_key = 'nav_menu_' . md5(serialize($args));
                $cached = get_transient($cache_key);
                
                if ($cached === false) {
                    set_transient($cache_key, $nav_menu, HOUR_IN_SECONDS);
                }
                
                return $cached ?: $nav_menu;
            }, 10, 2);
        }
    });
}
add_action('init', 'sueno_andino_cache_queries');

/**
 * Limpiar cache al actualizar contenido
 */
function sueno_andino_clear_cache_on_update() {
    // Limpiar cache de menús
    add_action('wp_update_nav_menu', function() {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_nav_menu_%'");
    });
    
    // Limpiar cache de widgets
    add_action('update_option_sidebars_widgets', function() {
        global $wpdb;
        $wpdb->query("DELETE FROM {$wp_db->options} WHERE option_name LIKE '_transient_widget_%'");
    });
}
add_action('init', 'sueno_andino_clear_cache_on_update');

/**
 * Optimizar base de datos
 */
function sueno_andino_optimize_database() {
    // Limpiar revisiones automáticamente
    add_action('wp_scheduled_delete', function() {
        global $wpdb;
        
        // Eliminar revisiones antiguas
        $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_type = 'revision' AND post_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
        
        // Eliminar spam y trash
        $wpdb->query("DELETE FROM {$wpdb->posts} WHERE post_status = 'trash' AND post_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
        $wpdb->query("DELETE FROM {$wpdb->comments} WHERE comment_approved = 'spam' AND comment_date < DATE_SUB(NOW(), INTERVAL 30 DAY)");
    });
}
add_action('init', 'sueno_andino_optimize_database');

/**
 * Comprimir recursos
 */
function sueno_andino_compress_resources() {
    // Habilitar compresión GZIP
    if (!ob_get_level()) {
        ob_start('ob_gzhandler');
    }
}
add_action('init', 'sueno_andino_compress_resources');

/**
 * Optimizar carga de scripts
 */
function sueno_andino_optimize_script_loading() {
    // Cargar jQuery desde CDN si no está en admin
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', false, '3.6.0', true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'sueno_andino_optimize_script_loading', 1);
