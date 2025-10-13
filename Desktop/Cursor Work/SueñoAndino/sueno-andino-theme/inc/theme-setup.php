<?php
/**
 * Theme Setup Functions
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
 * Configuración del tema
 */
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
    
    // Soporte para Elementor
    add_theme_support('elementor');
    
    // Soporte para Elementor Pro (si está disponible)
    if (defined('ELEMENTOR_PRO_VERSION')) {
        add_theme_support('elementor-pro');
    }
    
    // Soporte para anchos de contenido Elementor
    add_theme_support('elementor-width');
    
    // Soporte para editor de bloques
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    
    // Soporte para responsive embeds
    add_theme_support('responsive-embeds');
    
    // Soporte para custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));
    
    // Soporte para custom header
    add_theme_support('custom-header', array(
        'default-image'      => '',
        'default-text-color' => '1a1a1a',
        'width'              => 1200,
        'height'             => 400,
        'flex-height'        => true,
        'flex-width'         => true,
    ));
}
add_action('after_setup_theme', 'sueno_andino_setup');

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
 * Registrar widgets
 */
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

    // Register widget areas for each section of the front page
    $sections = array(
        'hero-section' => 'Hero Section',
        'why-we-exist-section' => 'Why We Exist Section',
        'timeline-section' => 'Timeline Section',
        'services-section' => 'Services Section',
        'testimonials-section' => 'Testimonials Section',
        'team-section' => 'Team Section',
        'blog-section' => 'Blog Section',
        'contact-section' => 'Contact Section',
    );

    foreach ($sections as $id => $name) {
        register_sidebar(array(
            'name'          => __($name, 'sueno-andino'),
            'id'            => $id,
            'description'   => sprintf(__('Widgets para la sección %s de la página principal.', 'sueno-andino'), $name),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ));
    }
}
add_action('widgets_init', 'sueno_andino_widgets');

/**
 * Menú principal fallback
 */
function sueno_andino_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Inicio', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#servicios">' . esc_html__('Servicios', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#nosotros">' . esc_html__('Nosotros', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#equipo">' . esc_html__('Equipo', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#contacto">' . esc_html__('Contacto', 'sueno-andino') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'sueno-andino') . '</a></li>';
    echo '</ul>';
}

/**
 * Menú footer fallback
 */
function sueno_andino_footer_fallback_menu() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Inicio', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#servicios">' . esc_html__('Servicios', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#nosotros">' . esc_html__('Nosotros', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#equipo">' . esc_html__('Equipo', 'sueno-andino') . '</a></li>';
    echo '<li><a href="#contacto">' . esc_html__('Contacto', 'sueno-andino') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/blog')) . '">' . esc_html__('Blog', 'sueno-andino') . '</a></li>';
    echo '</ul>';
}

/**
 * Agregar clases CSS al body
 */
function sueno_andino_body_classes($classes) {
    // Agregar clase si es página de inicio
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    // Agregar clase si hay sidebar
    if (is_active_sidebar('sidebar-1')) {
        $classes[] = 'has-sidebar';
    }
    
    return $classes;
}
add_filter('body_class', 'sueno_andino_body_classes');

/**
 * Personalizar excerpt length
 */
function sueno_andino_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'sueno_andino_excerpt_length');

/**
 * Personalizar excerpt more
 */
function sueno_andino_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'sueno_andino_excerpt_more');
