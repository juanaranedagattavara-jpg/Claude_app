<?php
/**
 * Campos personalizados para Sueño Andino
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registrar campos personalizados usando Customizer
 */
function sueno_andino_customize_register($wp_customize) {
    // Panel de Sueño Andino
    $wp_customize->add_panel('sueno_andino_panel', array(
        'title' => __('Sueño Andino', 'sueno-andino'),
        'description' => __('Configuración específica del tema Sueño Andino', 'sueno-andino'),
        'priority' => 30,
    ));

    // Sección de Información de Contacto
    $wp_customize->add_section('sueno_andino_contact', array(
        'title' => __('Información de Contacto', 'sueno-andino'),
        'panel' => 'sueno_andino_panel',
        'priority' => 10,
    ));

    // Email de contacto
    $wp_customize->add_setting('contact_email', array(
        'default' => 'contacto@suenoandino.org',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email de Contacto', 'sueno-andino'),
        'section' => 'sueno_andino_contact',
        'type' => 'email',
    ));

    // Teléfono de contacto
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+51 999 888 777',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Teléfono de Contacto', 'sueno-andino'),
        'section' => 'sueno_andino_contact',
        'type' => 'text',
    ));

    // Dirección
    $wp_customize->add_setting('contact_address', array(
        'default' => 'Lima, Perú',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label' => __('Dirección', 'sueno-andino'),
        'section' => 'sueno_andino_contact',
        'type' => 'text',
    ));

    // WhatsApp
    $wp_customize->add_setting('contact_whatsapp', array(
        'default' => 'https://wa.me/51999888777',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('contact_whatsapp', array(
        'label' => __('Enlace de WhatsApp', 'sueno-andino'),
        'section' => 'sueno_andino_contact',
        'type' => 'url',
    ));

    // Sección de Redes Sociales
    $wp_customize->add_section('sueno_andino_social', array(
        'title' => __('Redes Sociales', 'sueno-andino'),
        'panel' => 'sueno_andino_panel',
        'priority' => 20,
    ));

    // Facebook
    $wp_customize->add_setting('social_facebook', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label' => __('Facebook', 'sueno-andino'),
        'section' => 'sueno_andino_social',
        'type' => 'url',
    ));

    // Twitter
    $wp_customize->add_setting('social_twitter', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_twitter', array(
        'label' => __('Twitter', 'sueno-andino'),
        'section' => 'sueno_andino_social',
        'type' => 'url',
    ));

    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_instagram', array(
        'label' => __('Instagram', 'sueno-andino'),
        'section' => 'sueno_andino_social',
        'type' => 'url',
    ));

    // LinkedIn
    $wp_customize->add_setting('social_linkedin', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin', array(
        'label' => __('LinkedIn', 'sueno-andino'),
        'section' => 'sueno_andino_social',
        'type' => 'url',
    ));

    // YouTube
    $wp_customize->add_setting('social_youtube', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label' => __('YouTube', 'sueno-andino'),
        'section' => 'sueno_andino_social',
        'type' => 'url',
    ));

    // Sección de Estadísticas de Impacto
    $wp_customize->add_section('sueno_andino_stats', array(
        'title' => __('Estadísticas de Impacto', 'sueno-andino'),
        'panel' => 'sueno_andino_panel',
        'priority' => 30,
    ));

    // Beneficiarios
    $wp_customize->add_setting('stat_beneficiarios', array(
        'default' => '1,200+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_beneficiarios', array(
        'label' => __('Número de Beneficiarios', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_beneficiarios_label', array(
        'default' => 'Personas Beneficiadas',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_beneficiarios_label', array(
        'label' => __('Etiqueta de Beneficiarios', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    // Comunidades
    $wp_customize->add_setting('stat_comunidades', array(
        'default' => '25+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_comunidades', array(
        'label' => __('Número de Comunidades', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_comunidades_label', array(
        'default' => 'Comunidades Atendidas',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_comunidades_label', array(
        'label' => __('Etiqueta de Comunidades', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    // Proyectos
    $wp_customize->add_setting('stat_proyectos', array(
        'default' => '15+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_proyectos', array(
        'label' => __('Número de Proyectos', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_proyectos_label', array(
        'default' => 'Proyectos Exitosos',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_proyectos_label', array(
        'label' => __('Etiqueta de Proyectos', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    // Satisfacción
    $wp_customize->add_setting('stat_satisfaccion', array(
        'default' => '98%',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_satisfaccion', array(
        'label' => __('Porcentaje de Satisfacción', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stat_satisfaccion_label', array(
        'default' => 'Satisfacción',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('stat_satisfaccion_label', array(
        'label' => __('Etiqueta de Satisfacción', 'sueno-andino'),
        'section' => 'sueno_andino_stats',
        'type' => 'text',
    ));
}
add_action('customize_register', 'sueno_andino_customize_register');

/**
 * Registrar meta boxes para páginas
 */
function sueno_andino_add_meta_boxes() {
    add_meta_box(
        'sueno_andino_page_options',
        __('Opciones de Página', 'sueno-andino'),
        'sueno_andino_page_options_callback',
        'page',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'sueno_andino_add_meta_boxes');

/**
 * Callback para el meta box de opciones de página
 */
function sueno_andino_page_options_callback($post) {
    wp_nonce_field('sueno_andino_page_options', 'sueno_andino_page_options_nonce');
    
    $hide_title = get_post_meta($post->ID, '_sueno_andino_hide_title', true);
    $custom_css = get_post_meta($post->ID, '_sueno_andino_custom_css', true);
    $page_layout = get_post_meta($post->ID, '_sueno_andino_page_layout', true);
    
    ?>
    <p>
        <label>
            <input type="checkbox" name="sueno_andino_hide_title" value="1" <?php checked($hide_title, 1); ?>>
            <?php _e('Ocultar título de la página', 'sueno-andino'); ?>
        </label>
    </p>
    
    <p>
        <label for="sueno_andino_page_layout"><?php _e('Layout de la página:', 'sueno-andino'); ?></label>
        <select name="sueno_andino_page_layout" id="sueno_andino_page_layout">
            <option value="default" <?php selected($page_layout, 'default'); ?>><?php _e('Por defecto', 'sueno-andino'); ?></option>
            <option value="full-width" <?php selected($page_layout, 'full-width'); ?>><?php _e('Ancho completo', 'sueno-andino'); ?></option>
            <option value="narrow" <?php selected($page_layout, 'narrow'); ?>><?php _e('Estrecho', 'sueno-andino'); ?></option>
        </select>
    </p>
    
    <p>
        <label for="sueno_andino_custom_css"><?php _e('CSS personalizado:', 'sueno-andino'); ?></label>
        <textarea name="sueno_andino_custom_css" id="sueno_andino_custom_css" rows="5" style="width: 100%;"><?php echo esc_textarea($custom_css); ?></textarea>
    </p>
    <?php
}

/**
 * Guardar meta box de opciones de página
 */
function sueno_andino_save_page_options($post_id) {
    if (!isset($_POST['sueno_andino_page_options_nonce']) || !wp_verify_nonce($_POST['sueno_andino_page_options_nonce'], 'sueno_andino_page_options')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $hide_title = isset($_POST['sueno_andino_hide_title']) ? 1 : 0;
    update_post_meta($post_id, '_sueno_andino_hide_title', $hide_title);

    if (isset($_POST['sueno_andino_page_layout'])) {
        update_post_meta($post_id, '_sueno_andino_page_layout', sanitize_text_field($_POST['sueno_andino_page_layout']));
    }

    if (isset($_POST['sueno_andino_custom_css'])) {
        update_post_meta($post_id, '_sueno_andino_custom_css', sanitize_textarea_field($_POST['sueno_andino_custom_css']));
    }
}
add_action('save_post', 'sueno_andino_save_page_options');
