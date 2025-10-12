<?php
/**
 * Elementor Configuration for Sueño Andino Theme
 * 
 * @package SueñoAndino
 * @version 1.0
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Configurar Elementor al activar el tema
function sueno_andino_elementor_setup() {
    // Habilitar Elementor en todos los tipos de post
    add_post_type_support('page', 'elementor');
    add_post_type_support('post', 'elementor');
    
    // Configurar opciones de Elementor
    update_option('elementor_cpt_support', array('page', 'post'));
    update_option('elementor_css_print_method', 'external');
    update_option('elementor_default_generic_fonts', 'Inter');
    update_option('elementor_disable_color_schemes', '');
    update_option('elementor_disable_typography_schemes', '');
    update_option('elementor_editor_break_lines', 1);
    update_option('elementor_global_image_lightbox', 'yes');
    update_option('elementor_page_title_selector', 'h1.entry-title');
    
    // Configurar esquema de colores de Sueño Andino
    update_option('elementor_scheme_color', array(
        '1' => '#0e5e6f',  // Color primario
        '2' => '#7fb069',  // Color secundario
        '3' => '#d4a574',  // Color de acento
        '4' => '#8b5a3c'   // Color adicional
    ));
    
    // Configurar tipografía
    update_option('elementor_scheme_typography', array(
        '1' => array('font_family' => 'Inter', 'font_weight' => '600'),
        '2' => array('font_family' => 'Inter', 'font_weight' => '400'),
        '3' => array('font_family' => 'Inter', 'font_weight' => '400'),
        '4' => array('font_family' => 'Inter', 'font_weight' => '400')
    ));
    
    // Configurar espaciado
    update_option('elementor_space_between_widgets', array('size' => 20, 'unit' => 'px'));
    update_option('elementor_stretched_section_container', '.container');
    
    // Configurar viewports
    update_option('elementor_viewport_lg', 1025);
    update_option('elementor_viewport_md', 768);
    update_option('elementor_viewport_xl', 1440);
}
add_action('after_switch_theme', 'sueno_andino_elementor_setup');

// Registrar ubicaciones de Elementor
function sueno_andino_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'sueno_andino_elementor_locations');

// CSS personalizado para Elementor
function sueno_andino_elementor_custom_css() {
    ?>
    <style>
    /* Variables CSS globales para Elementor */
    :root {
        --e-global-color-primary: #0e5e6f;
        --e-global-color-secondary: #7fb069;
        --e-global-color-text: #1a1a1a;
        --e-global-color-accent: #d4a574;
        --e-global-color-cloud: #f8f9fa;
        --e-global-color-light: #ffffff;
        
        --e-global-typography-primary-font-family: 'Inter';
        --e-global-typography-primary-font-weight: 600;
        --e-global-typography-secondary-font-family: 'Inter';
        --e-global-typography-secondary-font-weight: 400;
        --e-global-typography-text-font-family: 'Inter';
        --e-global-typography-text-font-weight: 400;
        --e-global-typography-accent-font-family: 'Inter';
        --e-global-typography-accent-font-weight: 400;
    }
    
    /* Estilos base para Elementor */
    .elementor-page .elementor {
        font-family: 'Inter', sans-serif;
    }
    
    .elementor-widget-heading h1,
    .elementor-widget-heading h2,
    .elementor-widget-heading h3,
    .elementor-widget-heading h4,
    .elementor-widget-heading h5,
    .elementor-widget-heading h6 {
        font-family: 'Inter', sans-serif;
        font-weight: 600;
    }
    
    .elementor-widget-text-editor {
        font-family: 'Inter', sans-serif;
    }
    
    /* Timeline personalizado para Elementor */
    .elementor-timeline-item {
        position: relative;
        margin-bottom: 2rem;
    }
    
    .elementor-timeline-year {
        background: var(--e-global-color-primary);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-weight: 700;
        display: inline-block;
        margin-bottom: 1rem;
    }
    
    /* Botones personalizados */
    .elementor-button {
        border-radius: 12px !important;
        font-family: 'Inter', sans-serif !important;
        font-weight: 600 !important;
        transition: all 0.3s ease !important;
    }
    
    .elementor-button:hover {
        transform: translateY(-2px) !important;
    }
    
    /* Secciones personalizadas */
    .elementor-section {
        position: relative;
    }
    
    /* Hero section personalizada */
    .elementor-hero-section {
        background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
        padding: 80px 0;
    }
    
    /* Timeline section personalizada */
    .elementor-timeline-section {
        background: #f8f6f3;
        padding: 100px 0;
    }
    </style>
    <?php
}
add_action('wp_head', 'sueno_andino_elementor_custom_css');

// JavaScript personalizado para Elementor
function sueno_andino_elementor_custom_js() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        // Smooth scrolling para enlaces internos
        $('a[href*="#"]:not([href="#"])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                    return false;
                }
            }
        });
        
        // Animación de números en estadísticas
        function animateNumbers() {
            $('.stat-number').each(function() {
                var $this = $(this);
                var countTo = $this.attr('data-count');
                
                $({ countNum: $this.text() }).animate({
                    countNum: countTo
                }, {
                    duration: 2000,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
            });
        }
        
        // Trigger animación cuando las estadísticas son visibles
        $(window).scroll(function() {
            var scroll = $(window).scrollTop();
            var height = $(window).height();
            var statsOffset = $('.hero-stats').offset().top;
            
            if (scroll + height > statsOffset && !$('.stat-number').hasClass('animated')) {
                $('.stat-number').addClass('animated');
                animateNumbers();
            }
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'sueno_andino_elementor_custom_js');
