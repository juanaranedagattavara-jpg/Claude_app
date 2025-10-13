<?php
/**
 * Enqueue Scripts and Styles
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
 * Enqueue scripts y estilos
 */
function sueno_andino_scripts() {
    $theme_version = '1.0.0';
    
    // Google Fonts con preconnect para mejor rendimiento
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );
    
    // CSS crítico inline
    $critical_css = file_get_contents(get_template_directory() . '/assets/css/critical.css');
    if ($critical_css) {
        wp_add_inline_style('google-fonts', $critical_css);
    }
    
    // CSS principal
    wp_enqueue_style(
        'sueno-andino-main',
        get_template_directory_uri() . '/assets/css/main.css',
        array('google-fonts'),
        $theme_version,
        'all'
    );
    
    // JavaScript principal
    wp_enqueue_script(
        'sueno-andino-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        $theme_version,
        true
    );
    
    // Localización para AJAX
    wp_localize_script('sueno-andino-main', 'suenoAndino', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sueno_andino_nonce'),
        'themeUrl' => get_template_directory_uri(),
        'homeUrl' => home_url('/'),
    ));
    
    // Comentarios en singular
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'sueno_andino_scripts');

/**
 * Enqueue estilos del editor
 */
function sueno_andino_editor_styles() {
    wp_enqueue_style(
        'sueno-andino-editor-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0.0'
    );
}
add_action('enqueue_block_editor_assets', 'sueno_andino_editor_styles');

/**
 * Agregar preconnect para Google Fonts
 */
function sueno_andino_resource_hints($urls, $relation_type) {
    if (wp_style_is('google-fonts', 'queue') && 'preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    return $urls;
}
add_filter('wp_resource_hints', 'sueno_andino_resource_hints', 10, 2);

/**
 * Optimizar carga de scripts
 */
function sueno_andino_optimize_scripts($tag, $handle, $src) {
    // Scripts que deben cargarse con defer
    $defer_scripts = array('sueno-andino-main');
    
    if (in_array($handle, $defer_scripts)) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    
    return $tag;
}
add_filter('script_loader_tag', 'sueno_andino_optimize_scripts', 10, 3);

/**
 * Remover jQuery Migrate en frontend
 */
function sueno_andino_remove_jquery_migrate($scripts) {
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}
add_action('wp_default_scripts', 'sueno_andino_remove_jquery_migrate');

/**
 * Agregar meta tags para performance
 */
function sueno_andino_meta_tags() {
    echo '<meta name="theme-color" content="#0e5e6f">' . "\n";
    echo '<meta name="msapplication-TileColor" content="#0e5e6f">' . "\n";
}
add_action('wp_head', 'sueno_andino_meta_tags');
