<?php
/**
 * Sueño Andino Theme Functions
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Configuración del tema
function sueno_andino_setup() {
    // Soporte para título dinámico
    add_theme_support('title-tag');
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Soporte para Gutenberg
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
    
    // Soporte para menús
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'sueno-andino'),
        'footer' => __('Menú Footer', 'sueno-andino'),
    ));
}
add_action('after_setup_theme', 'sueno_andino_setup');

// Enqueue de estilos y scripts
function sueno_andino_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap', array(), null);
    
    // Estilos principales
    wp_enqueue_style('sueno-andino-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_style('sueno-andino-base', get_template_directory_uri() . '/assets/css/base.css', array(), '1.0.0');
    wp_enqueue_style('sueno-andino-premium', get_template_directory_uri() . '/assets/css/premium.css', array(), '1.0.0');
    
    // Scripts
    wp_enqueue_script('sueno-andino-main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    
    // Localizar script para AJAX
    wp_localize_script('sueno-andino-main', 'suenoAndino', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('sueno_andino_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'sueno_andino_scripts');

// Registrar áreas de widgets
function sueno_andino_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar Principal', 'sueno-andino'),
        'id' => 'sidebar-1',
        'description' => __('Widgets para la barra lateral principal', 'sueno-andino'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Footer Widgets', 'sueno-andino'),
        'id' => 'footer-widgets',
        'description' => __('Widgets para el footer', 'sueno-andino'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="footer-widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'sueno_andino_widgets_init');

// Registrar categoría de bloques personalizados
function sueno_andino_block_categories( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug'  => 'sueno-andino',
                'title' => __( 'Sueño Andino', 'sueno-andino' ),
                'icon'  => 'admin-site-alt3',
            ),
        )
    );
}
add_filter( 'block_categories_all', 'sueno_andino_block_categories', 10, 2 );

// Registrar bloques personalizados
function sueno_andino_register_blocks() {
    // Registrar bloques desde archivos PHP
    if ( file_exists( get_template_directory() . '/blocks/hero-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/hero-block/block.php';
    }
    
    if ( file_exists( get_template_directory() . '/blocks/golden-circle-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/golden-circle-block/block.php';
    }
    
    if ( file_exists( get_template_directory() . '/blocks/servicios-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/servicios-block/block.php';
    }
    
    if ( file_exists( get_template_directory() . '/blocks/timeline-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/timeline-block/block.php';
    }
    
    if ( file_exists( get_template_directory() . '/blocks/testimonios-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/testimonios-block/block.php';
    }
    
    if ( file_exists( get_template_directory() . '/blocks/contacto-block/block.php' ) ) {
        include_once get_template_directory() . '/blocks/contacto-block/block.php';
    }
}
add_action( 'init', 'sueno_andino_register_blocks' );

// Enqueue scripts para bloques en el editor
function sueno_andino_block_editor_assets() {
    wp_enqueue_script(
        'sueno-andino-blocks',
        get_template_directory_uri() . '/assets/js/blocks.js',
        array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-i18n' ),
        '1.0.0',
        true
    );
    
    wp_enqueue_style(
        'sueno-andino-blocks-editor',
        get_template_directory_uri() . '/assets/css/blocks-editor.css',
        array( 'wp-edit-blocks' ),
        '1.0.0'
    );
}
add_action( 'enqueue_block_editor_assets', 'sueno_andino_block_editor_assets' );

// Incluir archivos de bloques personalizados
require_once get_template_directory() . '/inc/blocks.php';
require_once get_template_directory() . '/inc/custom-fields.php';
require_once get_template_directory() . '/inc/template-functions.php';
require_once get_template_directory() . '/inc/performance.php';
require_once get_template_directory() . '/inc/seo.php';
require_once get_template_directory() . '/inc/security.php';

// Optimizaciones de rendimiento
function sueno_andino_optimize() {
    // Remover emojis si no son necesarios
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Limpiar head
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
}
add_action('init', 'sueno_andino_optimize');
