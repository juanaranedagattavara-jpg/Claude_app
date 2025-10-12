<?php
/**
 * Sueño Andino Theme Functions
 * 
 * @package SueñoAndino
 * @version 1.0
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
    
    // Soporte para logo personalizado
    add_theme_support('custom-logo', array(
        'height'      => 45,
        'width'       => 45,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'sueno_andino_setup');

// Enqueue scripts y estilos
function sueno_andino_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Estilos del tema
    wp_enqueue_style('sueno-andino-style', get_stylesheet_uri(), array(), '1.0');
    
    // Scripts del tema
    wp_enqueue_script('sueno-andino-script', get_template_directory_uri() . '/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'sueno_andino_scripts');

// Registrar menús
function sueno_andino_menus() {
    register_nav_menus(array(
        'primary' => __('Menú Principal', 'sueno-andino'),
        'footer'  => __('Menú Footer', 'sueno-andino'),
    ));
}
add_action('init', 'sueno_andino_menus');

// Widgets
function sueno_andino_widgets() {
    register_sidebar(array(
        'name'          => __('Sidebar Principal', 'sueno-andino'),
        'id'            => 'sidebar-1',
        'description'   => __('Widgets que aparecen en la sidebar.', 'sueno-andino'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'sueno_andino_widgets');

// Personalizador de WordPress
function sueno_andino_customize_register($wp_customize) {
    // Sección de colores
    $wp_customize->add_section('sueno_andino_colors', array(
        'title'    => __('Colores del Tema', 'sueno-andino'),
        'priority' => 30,
    ));
    
    // Color primario
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#0e5e6f',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Color Primario', 'sueno-andino'),
        'section'  => 'sueno_andino_colors',
        'settings' => 'primary_color',
    )));
    
    // Color de acento
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#7fb069',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Color de Acento', 'sueno-andino'),
        'section'  => 'sueno_andino_colors',
        'settings' => 'accent_color',
    )));
}
add_action('customize_register', 'sueno_andino_customize_register');

// Función para obtener el color primario personalizado
function sueno_andino_get_primary_color() {
    return get_theme_mod('primary_color', '#0e5e6f');
}

// Función para obtener el color de acento personalizado
function sueno_andino_get_accent_color() {
    return get_theme_mod('accent_color', '#7fb069');
}
