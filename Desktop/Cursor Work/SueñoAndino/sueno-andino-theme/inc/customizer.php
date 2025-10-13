<?php
/**
 * WordPress Customizer Settings
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
 * Personalizador de WordPress - Colores
 */
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
    )));
    
    // Color de acento
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#7fb069',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Color de Acento', 'sueno-andino'),
        'section'  => 'sueno_andino_colors',
    )));
    
    // Color de fondo
    $wp_customize->add_setting('background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'background_color', array(
        'label'    => __('Color de Fondo', 'sueno-andino'),
        'section'  => 'sueno_andino_colors',
    )));
    
    // Color de texto
    $wp_customize->add_setting('text_color', array(
        'default'           => '#1a1a1a',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(
        'label'    => __('Color de Texto', 'sueno-andino'),
        'section'  => 'sueno_andino_colors',
    )));
}
add_action('customize_register', 'sueno_andino_customize_register');

/**
 * Personalizador adicional - Contenido de la página principal
 */
function sueno_andino_customize_register_additional($wp_customize) {
    // Sección de contenido de la página principal
    $wp_customize->add_section('sueno_andino_homepage', array(
        'title'    => __('Contenido de la Página Principal', 'sueno-andino'),
        'priority' => 40,
    ));
    
    // Título del hero
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'DESARROLLO TERRITORIAL REGENERATIVO DESDE Y HACIA LATINOAMÉRICA',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_title', array(
        'label'    => __('Título Principal', 'sueno-andino'),
        'section'  => 'sueno_andino_homepage',
        'type'     => 'textarea',
    ));
    
    // Descripción del hero
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Impulsamos proyectos de desarrollo territorial que devuelven vitalidad a los ecosistemas, fortalecen comunidades y generan prosperidad consciente y regenerativa.',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('hero_description', array(
        'label'    => __('Descripción Principal', 'sueno-andino'),
        'section'  => 'sueno_andino_homepage',
        'type'     => 'textarea',
    ));
    
    // Estadísticas
    $stats = array(
        'stat_1_number' => '1,200+',
        'stat_1_label' => 'Personas Beneficiadas',
        'stat_2_number' => '25+',
        'stat_2_label' => 'Comunidades Atendidas',
        'stat_3_number' => '15+',
        'stat_3_label' => 'Proyectos Exitosos',
        'stat_4_number' => '98%',
        'stat_4_label' => 'Satisfacción',
    );
    
    foreach ($stats as $setting => $default) {
        $wp_customize->add_setting($setting, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control($setting, array(
            'label'    => ucfirst(str_replace('_', ' ', $setting)),
            'section'  => 'sueno_andino_homepage',
            'type'     => 'text',
        ));
    }
    
    // Información de contacto
    $wp_customize->add_section('sueno_andino_contact', array(
        'title'    => __('Información de Contacto', 'sueno-andino'),
        'priority' => 50,
    ));
    
    $contact_fields = array(
        'contact_phone' => '+51-999-888-777',
        'contact_email' => 'hola@sueñoandino.com',
        'contact_address' => 'Lima, Perú',
    );
    
    foreach ($contact_fields as $field => $default) {
        $wp_customize->add_setting($field, array(
            'default'           => $default,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        
        $wp_customize->add_control($field, array(
            'label'    => ucfirst(str_replace('_', ' ', $field)),
            'section'  => 'sueno_andino_contact',
            'type'     => 'text',
        ));
    }
}
add_action('customize_register', 'sueno_andino_customize_register_additional');

/**
 * Generar CSS personalizado basado en opciones del Customizer
 */
function sueno_andino_customizer_css() {
    $primary_color = get_theme_mod('primary_color', '#0e5e6f');
    $accent_color = get_theme_mod('accent_color', '#7fb069');
    $background_color = get_theme_mod('background_color', '#ffffff');
    $text_color = get_theme_mod('text_color', '#1a1a1a');
    
    $css = "
    :root {
        --sa-primary: {$primary_color};
        --sa-accent: {$accent_color};
        --sa-light: {$background_color};
        --sa-ink: {$text_color};
    }
    ";
    
    wp_add_inline_style('sueno-andino-main', $css);
}
add_action('wp_enqueue_scripts', 'sueno_andino_customizer_css');
