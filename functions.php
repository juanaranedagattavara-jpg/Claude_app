<?php
/**
 * Sueño Andino Theme Functions
 *
 * @package SueñoAndino
 * @version 1.0.0
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuración del tema
 */
function sueno_andino_setup() {
    // Soporte para características del tema
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    // Soporte para Block Theme
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    
    // Soporte para responsive embeds
    add_theme_support('responsive-embeds');
    
    // Soporte para custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'sueno_andino_setup');

/**
 * Enqueue scripts y styles
 */
function sueno_andino_scripts() {
    // Estilos del tema
    wp_enqueue_style('sueno-andino-style', get_stylesheet_uri(), array(), '1.0.1');
    
    // Google Fonts con preload
    wp_enqueue_style('sueno-andino-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap', array(), null);
    
    // CSS Premium
    wp_enqueue_style('sueno-andino-premium', get_template_directory_uri() . '/assets/css/premium.css', array('sueno-andino-style'), '1.0.1');
    
    // Scripts del tema (solo si existe)
    if (file_exists(get_template_directory() . '/assets/js/main.js')) {
        wp_enqueue_script('sueno-andino-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.1', true);
    }
}
add_action('wp_enqueue_scripts', 'sueno_andino_scripts');

/**
 * Registrar menús
 */
function sueno_andino_menus() {
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'sueno-andino'),
        'footer'  => __('Menú Footer', 'sueno-andino'),
    ));
}
add_action('init', 'sueno_andino_menus');

/**
 * Registrar sidebars
 */
function sueno_andino_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'sueno-andino'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets para la barra lateral principal', 'sueno-andino'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'sueno_andino_widgets_init');

/**
 * Optimización de rendimiento
 */
function sueno_andino_optimize() {
    // Remover emojis si no son necesarios
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Remover versiones de scripts y estilos
    add_filter('style_loader_src', 'sueno_andino_remove_version', 9999);
    add_filter('script_loader_src', 'sueno_andino_remove_version', 9999);
}
add_action('init', 'sueno_andino_optimize');

function sueno_andino_remove_version($src) {
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

/**
 * Soporte para WebP
 */
function sueno_andino_webp_support($mime_types) {
    $mime_types['webp'] = 'image/webp';
    return $mime_types;
}
add_filter('upload_mimes', 'sueno_andino_webp_support');

/**
 * Lazy loading para imágenes
 */
function sueno_andino_lazy_loading($attr, $attachment, $size) {
    if (!is_admin()) {
        $attr['loading'] = 'lazy';
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'sueno_andino_lazy_loading', 10, 3);
