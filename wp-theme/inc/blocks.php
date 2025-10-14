<?php
/**
 * Funciones adicionales para bloques personalizados
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Registrar estilos para bloques en el frontend
 */
function sueno_andino_block_styles() {
    wp_enqueue_style(
        'sueno-andino-blocks-style',
        get_template_directory_uri() . '/assets/css/blocks.css',
        array(),
        '1.0.0'
    );
}
add_action('wp_enqueue_scripts', 'sueno_andino_block_styles');

/**
 * Registrar scripts para bloques en el frontend
 */
function sueno_andino_block_scripts() {
    wp_enqueue_script(
        'sueno-andino-blocks-frontend',
        get_template_directory_uri() . '/assets/js/blocks-frontend.js',
        array('jquery'),
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'sueno_andino_block_scripts');

/**
 * Agregar clases CSS personalizadas a los bloques
 */
function sueno_andino_block_wrapper_attributes($block_content, $block) {
    if (isset($block['blockName']) && strpos($block['blockName'], 'sueno-andino/') === 0) {
        $block_name = str_replace('sueno-andino/', '', $block['blockName']);
        $block_content = '<div class="sueno-andino-block sueno-andino-block-' . esc_attr($block_name) . '">' . $block_content . '</div>';
    }
    
    return $block_content;
}
add_filter('render_block', 'sueno_andino_block_wrapper_attributes', 10, 2);

/**
 * Agregar estilos inline para bloques específicos
 */
function sueno_andino_block_inline_styles() {
    ?>
    <style id="sueno-andino-block-styles">
        .sueno-andino-block {
            position: relative;
        }
        
        .sueno-andino-block-hero-block {
            margin: 0;
        }
        
        .sueno-andino-block-servicios-block {
            margin: 0;
        }
        
        /* Animaciones para bloques */
        .sueno-andino-block[data-animation="fade-in"] {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }
        
        .sueno-andino-block[data-animation="fade-in"].animate {
            opacity: 1;
            transform: translateY(0);
        }
        
        .sueno-andino-block[data-animation="slide-up"] {
            opacity: 0;
            transform: translateY(50px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        
        .sueno-andino-block[data-animation="slide-up"].animate {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <?php
}
add_action('wp_head', 'sueno_andino_block_inline_styles');

/**
 * Agregar atributos de datos a los bloques
 */
function sueno_andino_block_attributes($block_content, $block) {
    if (isset($block['blockName']) && strpos($block['blockName'], 'sueno-andino/') === 0) {
        $animation = isset($block['attrs']['animation']) ? $block['attrs']['animation'] : 'fade-in';
        $block_content = str_replace('<div class="sueno-andino-block', '<div class="sueno-andino-block" data-animation="' . esc_attr($animation) . '"', $block_content);
    }
    
    return $block_content;
}
add_filter('render_block', 'sueno_andino_block_attributes', 10, 2);

/**
 * Script para animaciones de bloques
 */
function sueno_andino_block_animation_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const blocks = document.querySelectorAll('.sueno-andino-block[data-animation]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        blocks.forEach(block => {
            observer.observe(block);
        });
    });
    </script>
    <?php
}
add_action('wp_footer', 'sueno_andino_block_animation_script');

/**
 * Agregar soporte para patrones de bloques
 */
function sueno_andino_register_block_patterns() {
    if (function_exists('register_block_pattern')) {
        // Patrón de página de inicio completa
        register_block_pattern(
            'sueno-andino/homepage-pattern',
            array(
                'title' => __('Página de Inicio Completa', 'sueno-andino'),
                'description' => __('Patrón completo para la página de inicio con todas las secciones', 'sueno-andino'),
                'content' => '<!-- wp:sueno-andino/hero-block -->
                <div class="wp-block-sueno-andino-hero-block">
                    <!-- Contenido del hero -->
                </div>
                <!-- /wp:sueno-andino/hero-block -->
                
                <!-- wp:sueno-andino/servicios-block -->
                <div class="wp-block-sueno-andino-servicios-block">
                    <!-- Contenido de servicios -->
                </div>
                <!-- /wp:sueno-andino/servicios-block -->',
                'categories' => array('sueno-andino'),
            )
        );
    }
}
add_action('init', 'sueno_andino_register_block_patterns');

/**
 * Registrar categoría de patrones personalizados
 */
function sueno_andino_register_pattern_category() {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category(
            'sueno-andino',
            array(
                'label' => __('Sueño Andino', 'sueno-andino'),
                'description' => __('Patrones específicos para el tema Sueño Andino', 'sueno-andino'),
            )
        );
    }
}
add_action('init', 'sueno_andino_register_pattern_category');

/**
 * Agregar estilos para el editor de bloques
 */
function sueno_andino_block_editor_styles() {
    wp_enqueue_style(
        'sueno-andino-block-editor-styles',
        get_template_directory_uri() . '/assets/css/blocks-editor.css',
        array('wp-edit-blocks'),
        '1.0.0'
    );
}
add_action('enqueue_block_editor_assets', 'sueno_andino_block_editor_styles');

/**
 * Agregar soporte para bloques anidados
 */
function sueno_andino_support_nested_blocks() {
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
}
add_action('after_setup_theme', 'sueno_andino_support_nested_blocks');

/**
 * Personalizar el editor de bloques
 */
function sueno_andino_block_editor_settings($settings) {
    $settings['styles'][] = array(
        'css' => '
            .wp-block {
                max-width: 1200px;
            }
            .wp-block[data-align="full"] {
                max-width: none;
            }
            .wp-block[data-align="wide"] {
                max-width: 1400px;
            }
        '
    );
    
    return $settings;
}
add_filter('block_editor_settings', 'sueno_andino_block_editor_settings');
