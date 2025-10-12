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

// Incluir configuración de Elementor
require_once get_template_directory() . '/elementor-config.php';

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
    
    // Soporte para Elementor
    add_theme_support('elementor');
    
    // Soporte para Elementor Pro
    add_theme_support('elementor-pro');
    
    // Soporte para Elementor Kit
    add_theme_support('elementor-kit');
    
    // Soporte para anchos de contenido Elementor
    add_theme_support('elementor-width');
    
    // Soporte para elementos de Elementor
    add_theme_support('elementor-elements');
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

// ===== FUNCIONES ESPECÍFICAS PARA ELEMENTOR =====

// Registrar ubicaciones de Elementor
function sueno_andino_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'sueno_andino_elementor_locations');

// Configurar anchos de contenido para Elementor
function sueno_andino_elementor_content_width() {
    $GLOBALS['content_width'] = apply_filters('sueno_andino_content_width', 1200);
}
add_action('after_setup_theme', 'sueno_andino_elementor_content_width', 0);

// Soporte para Elementor Kit
function sueno_andino_elementor_kit() {
    // Habilitar Kit de Elementor
    add_theme_support('elementor-kit');
    
    // Configurar colores del kit
    add_action('elementor/kit/register_settings', function($kit) {
        $kit->register_settings('colors', array(
            'primary' => '#0e5e6f',
            'secondary' => '#7fb069',
            'text' => '#1a1a1a',
            'accent' => '#d4a574',
        ));
    });
}
add_action('after_setup_theme', 'sueno_andino_elementor_kit');

// Widgets personalizados para Elementor
function sueno_andino_elementor_widgets($widgets_manager) {
    // Registrar widgets personalizados aquí si es necesario
}
add_action('elementor/widgets/register', 'sueno_andino_elementor_widgets');

// Configurar Elementor para usar el tema
function sueno_andino_elementor_config() {
    // Habilitar todas las características de Elementor
    update_option('elementor_cpt_support', array('page', 'post'));
    update_option('elementor_css_print_method', 'external');
    update_option('elementor_default_generic_fonts', 'Inter');
    update_option('elementor_disable_color_schemes', '');
    update_option('elementor_disable_typography_schemes', '');
    update_option('elementor_editor_break_lines', 1);
    update_option('elementor_experiment-e_optimized_assets_loading', 'active');
    update_option('elementor_experiment-e_optimized_css_loading', 'active');
    update_option('elementor_experiment-e_optimized_dom_output', 'active');
    update_option('elementor_experiment-e_optimized_loading', 'active');
    update_option('elementor_global_image_lightbox', 'yes');
    update_option('elementor_load_fa4_shim', '');
    update_option('elementor_page_title_selector', 'h1.entry-title');
    update_option('elementor_scheme_color', array(
        '1' => '#0e5e6f',
        '2' => '#7fb069', 
        '3' => '#d4a574',
        '4' => '#8b5a3c'
    ));
    update_option('elementor_scheme_color-picker', array(
        '1' => '#0e5e6f',
        '2' => '#7fb069',
        '3' => '#d4a574', 
        '4' => '#8b5a3c'
    ));
    update_option('elementor_scheme_typography', array(
        '1' => array('font_family' => 'Inter', 'font_weight' => '600'),
        '2' => array('font_family' => 'Inter', 'font_weight' => '400'),
        '3' => array('font_family' => 'Inter', 'font_weight' => '400'),
        '4' => array('font_family' => 'Inter', 'font_weight' => '400')
    ));
    update_option('elementor_space_between_widgets', array('size' => 20, 'unit' => 'px'));
    update_option('elementor_stretched_section_container', '.container');
    update_option('elementor_unfiltered_files_upload', '');
    update_option('elementor_upgrade_notice', 0);
    update_option('elementor_viewport_lg', 1025);
    update_option('elementor_viewport_md', 768);
    update_option('elementor_viewport_xl', 1440);
}
add_action('after_switch_theme', 'sueno_andino_elementor_config');

// CSS personalizado para Elementor
function sueno_andino_elementor_css() {
    ?>
    <style>
    /* Variables CSS para Elementor */
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
    </style>
    <?php
}
add_action('wp_head', 'sueno_andino_elementor_css');

// Habilitar Elementor en todas las páginas
function sueno_andino_elementor_support() {
    add_post_type_support('page', 'elementor');
    add_post_type_support('post', 'elementor');
}
add_action('init', 'sueno_andino_elementor_support');

// ===== FUNCIONES AUXILIARES =====

// Mostrar fecha de publicación
function sueno_andino_posted_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if (get_the_time('U') !== get_the_modified_time('U')) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_html(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_html(get_the_modified_date())
    );

    $posted_on = sprintf(
        /* translators: %s: post date. */
        esc_html_x('Posted on %s', 'post date', 'sueno-andino'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-on">' . $posted_on . '</span>';
}

// Mostrar autor
function sueno_andino_posted_by() {
    $byline = sprintf(
        /* translators: %s: post author. */
        esc_html_x('by %s', 'post author', 'sueno-andino'),
        '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline"> ' . $byline . '</span>';
}

// Mostrar thumbnail del post
function sueno_andino_post_thumbnail() {
    if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
        return;
    }

    if (is_singular()) :
        ?>
        <div class="post-thumbnail">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php
    else :
        ?>
        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
            <?php
            the_post_thumbnail(
                'post-thumbnail',
                array(
                    'alt' => the_title_attribute(
                        array(
                            'echo' => false,
                        )
                    ),
                )
            );
            ?>
        </a>
        <?php
    endif;
}

// Footer del entry
function sueno_andino_entry_footer() {
    // Hide category and tag text for pages.
    if ('post' === get_post_type()) {
        /* translators: used between list items, there is a space after the comma */
        $categories_list = get_the_category_list(esc_html__(', ', 'sueno-andino'));
        if ($categories_list) {
            /* translators: 1: list of categories. */
            printf('<span class="cat-links">' . esc_html__('Posted in %1$s', 'sueno-andino') . '</span>', $categories_list);
        }

        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'sueno-andino'));
        if ($tags_list) {
            /* translators: 1: list of tags. */
            printf('<span class="tags-links">' . esc_html__('Tagged %1$s', 'sueno-andino') . '</span>', $tags_list);
        }
    }

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
        echo '<span class="comments-link">';
        comments_popup_link(
            sprintf(
                wp_kses(
                    /* translators: %s: post title */
                    __('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'sueno-andino'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            )
        );
        echo '</span>';
    }

    edit_post_link(
        sprintf(
            wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Edit <span class="screen-reader-text">%s</span>', 'sueno-andino'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            get_the_title()
        ),
        '<span class="edit-link">',
        '</span>'
    );
}
