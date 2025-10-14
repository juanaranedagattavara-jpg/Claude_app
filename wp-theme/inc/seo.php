<?php
/**
 * Optimizaciones SEO para Sueño Andino
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Configuración SEO básica
 */
function sueno_andino_seo_setup() {
    // Soporte para title-tag
    add_theme_support('title-tag');
    
    // Soporte para HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'script',
        'style'
    ));
    
    // Soporte para imágenes destacadas
    add_theme_support('post-thumbnails');
    
    // Soporte para feeds
    add_theme_support('automatic-feed-links');
    
    // Soporte para custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'sueno_andino_seo_setup');

/**
 * Meta tags SEO
 */
function sueno_andino_seo_meta_tags() {
    if (is_front_page()) {
        $title = get_bloginfo('name') . ' - ' . get_bloginfo('description');
        $description = 'Sueño Andino: Transformamos vidas en las comunidades andinas a través de desarrollo territorial regenerativo, educación y emprendimiento.';
        $keywords = 'desarrollo territorial, comunidades andinas, educación, emprendimiento, responsabilidad social, desarrollo sostenible, Perú, Latinoamérica';
    } elseif (is_singular()) {
        $title = get_the_title() . ' - ' . get_bloginfo('name');
        $description = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20);
        $keywords = '';
    } else {
        $title = get_bloginfo('name');
        $description = get_bloginfo('description');
        $keywords = '';
    }
    
    // Meta title
    echo '<title>' . esc_html($title) . '</title>' . "\n";
    
    // Meta description
    echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
    
    // Meta keywords
    if (!empty($keywords)) {
        echo '<meta name="keywords" content="' . esc_attr($keywords) . '">' . "\n";
    }
    
    // Meta robots
    echo '<meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">' . "\n";
    
    // Canonical URL
    echo '<link rel="canonical" href="' . esc_url(get_permalink()) . '">' . "\n";
    
    // Open Graph
    sueno_andino_open_graph_tags();
    
    // Twitter Card
    sueno_andino_twitter_card_tags();
    
    // Schema.org
    sueno_andino_schema_markup();
}
add_action('wp_head', 'sueno_andino_seo_meta_tags', 1);

/**
 * Open Graph tags
 */
function sueno_andino_open_graph_tags() {
    $og_title = is_front_page() ? get_bloginfo('name') : get_the_title();
    $og_description = is_front_page() ? 'Sueño Andino: Transformamos vidas en las comunidades andinas a través de desarrollo territorial regenerativo, educación y emprendimiento.' : (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20));
    $og_image = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/img/hero-background.jpg';
    $og_url = get_permalink();
    $og_type = is_front_page() ? 'website' : 'article';
    
    echo '<meta property="og:title" content="' . esc_attr($og_title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($og_description) . '">' . "\n";
    echo '<meta property="og:image" content="' . esc_url($og_image) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($og_url) . '">' . "\n";
    echo '<meta property="og:type" content="' . esc_attr($og_type) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    echo '<meta property="og:locale" content="es_ES">' . "\n";
    
    if (is_singular() && get_the_author()) {
        echo '<meta property="article:author" content="' . esc_attr(get_the_author()) . '">' . "\n";
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_date('c')) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_date('c')) . '">' . "\n";
    }
}

/**
 * Twitter Card tags
 */
function sueno_andino_twitter_card_tags() {
    $twitter_title = is_front_page() ? get_bloginfo('name') : get_the_title();
    $twitter_description = is_front_page() ? 'Sueño Andino: Transformamos vidas en las comunidades andinas a través de desarrollo territorial regenerativo, educación y emprendimiento.' : (has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20));
    $twitter_image = is_singular() && has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/img/hero-background.jpg';
    
    echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
    echo '<meta name="twitter:title" content="' . esc_attr($twitter_title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($twitter_description) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($twitter_image) . '">' . "\n";
    echo '<meta name="twitter:site" content="@suenoandino">' . "\n";
    echo '<meta name="twitter:creator" content="@suenoandino">' . "\n";
}

/**
 * Schema.org markup
 */
function sueno_andino_schema_markup() {
    if (is_front_page()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => get_bloginfo('name'),
            'description' => get_bloginfo('description'),
            'url' => home_url(),
            'logo' => get_template_directory_uri() . '/assets/img/logo-sa-blanco.png',
            'image' => get_template_directory_uri() . '/assets/img/hero-background.jpg',
            'address' => array(
                '@type' => 'PostalAddress',
                'addressLocality' => 'Lima',
                'addressCountry' => 'PE'
            ),
            'contactPoint' => array(
                '@type' => 'ContactPoint',
                'telephone' => '+51-999-888-777',
                'contactType' => 'customer service',
                'email' => 'contacto@suenoandino.org'
            ),
            'sameAs' => array(
                'https://www.facebook.com/suenoandino',
                'https://www.instagram.com/suenoandino',
                'https://www.linkedin.com/company/suenoandino'
            ),
            'foundingDate' => '2018',
            'mission' => 'Transformar vidas en las comunidades andinas a través de desarrollo territorial regenerativo, educación y emprendimiento'
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    } elseif (is_singular()) {
        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => get_the_title(),
            'description' => has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 20),
            'image' => has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : get_template_directory_uri() . '/assets/img/hero-background.jpg',
            'author' => array(
                '@type' => 'Person',
                'name' => get_the_author()
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'logo' => array(
                    '@type' => 'ImageObject',
                    'url' => get_template_directory_uri() . '/assets/img/logo-sa-blanco.png'
                )
            ),
            'datePublished' => get_the_date('c'),
            'dateModified' => get_the_modified_date('c'),
            'mainEntityOfPage' => array(
                '@type' => 'WebPage',
                '@id' => get_permalink()
            )
        );
        
        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
    }
}

/**
 * Optimizar títulos de páginas
 */
function sueno_andino_optimize_titles($title) {
    if (is_front_page()) {
        return get_bloginfo('name') . ' - ' . get_bloginfo('description');
    } elseif (is_singular()) {
        return get_the_title() . ' - ' . get_bloginfo('name');
    } elseif (is_archive()) {
        return get_the_archive_title() . ' - ' . get_bloginfo('name');
    } elseif (is_search()) {
        return sprintf(__('Resultados de búsqueda para: %s', 'sueno-andino'), get_search_query()) . ' - ' . get_bloginfo('name');
    } elseif (is_404()) {
        return __('Página no encontrada', 'sueno-andino') . ' - ' . get_bloginfo('name');
    }
    
    return $title;
}
add_filter('wp_title', 'sueno_andino_optimize_titles');

/**
 * Optimizar URLs
 */
function sueno_andino_optimize_urls() {
    // Remover query strings de recursos estáticos
    add_filter('script_loader_src', 'sueno_andino_remove_query_strings', 15, 1);
    add_filter('style_loader_src', 'sueno_andino_remove_query_strings', 15, 1);
}
add_action('init', 'sueno_andino_optimize_urls');

/**
 * Remover query strings
 */
function sueno_andino_remove_query_strings($src) {
    $output = preg_split("/(&ver|\?ver)/", $src);
    return $output[0];
}

/**
 * Optimizar imágenes para SEO
 */
function sueno_andino_optimize_images_seo($attr, $attachment, $size) {
    if (!is_admin()) {
        // Agregar alt text si no existe
        if (empty($attr['alt']) && !empty($attachment->post_title)) {
            $attr['alt'] = $attachment->post_title;
        }
        
        // Agregar title si no existe
        if (empty($attr['title']) && !empty($attachment->post_title)) {
            $attr['title'] = $attachment->post_title;
        }
        
        // Agregar loading lazy
        $attr['loading'] = 'lazy';
        $attr['decoding'] = 'async';
    }
    
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'sueno_andino_optimize_images_seo', 10, 3);

/**
 * Sitemap XML personalizado
 */
function sueno_andino_create_sitemap() {
    if (isset($_GET['sitemap']) && $_GET['sitemap'] === 'xml') {
        header('Content-Type: application/xml; charset=UTF-8');
        
        echo '<?xml version="1.0" encoding="UTF-8"?>';
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        // Página de inicio
        echo '<url>';
        echo '<loc>' . home_url() . '</loc>';
        echo '<lastmod>' . date('c') . '</lastmod>';
        echo '<changefreq>weekly</changefreq>';
        echo '<priority>1.0</priority>';
        echo '</url>';
        
        // Páginas
        $pages = get_pages();
        foreach ($pages as $page) {
            echo '<url>';
            echo '<loc>' . get_permalink($page->ID) . '</loc>';
            echo '<lastmod>' . get_the_modified_date('c', $page->ID) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.8</priority>';
            echo '</url>';
        }
        
        // Posts
        $posts = get_posts(array('numberposts' => -1));
        foreach ($posts as $post) {
            echo '<url>';
            echo '<loc>' . get_permalink($post->ID) . '</loc>';
            echo '<lastmod>' . get_the_modified_date('c', $post->ID) . '</lastmod>';
            echo '<changefreq>monthly</changefreq>';
            echo '<priority>0.6</priority>';
            echo '</url>';
        }
        
        echo '</urlset>';
        exit;
    }
}
add_action('init', 'sueno_andino_create_sitemap');

/**
 * Robots.txt personalizado
 */
function sueno_andino_robots_txt($output) {
    $output .= "\n# Sueño Andino\n";
    $output .= "Sitemap: " . home_url() . "/?sitemap=xml\n";
    $output .= "Crawl-delay: 1\n";
    
    return $output;
}
add_filter('robots_txt', 'sueno_andino_robots_txt');

/**
 * Breadcrumbs
 */
function sueno_andino_breadcrumbs() {
    if (is_front_page()) {
        return;
    }
    
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol class="breadcrumb-list">';
    
    echo '<li class="breadcrumb-item">';
    echo '<a href="' . home_url() . '">Inicio</a>';
    echo '</li>';
    
    if (is_category() || is_single()) {
        if (is_single()) {
            $category = get_the_category();
            if ($category) {
                echo '<li class="breadcrumb-item">';
                echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a>';
                echo '</li>';
            }
            echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
        } else {
            echo '<li class="breadcrumb-item active">' . single_cat_title('', false) . '</li>';
        }
    } elseif (is_page()) {
        echo '<li class="breadcrumb-item active">' . get_the_title() . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb-item active">Resultados de búsqueda</li>';
    } elseif (is_404()) {
        echo '<li class="breadcrumb-item active">Página no encontrada</li>';
    }
    
    echo '</ol>';
    echo '</nav>';
}

/**
 * Meta tags adicionales
 */
function sueno_andino_additional_meta_tags() {
    // Viewport
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">' . "\n";
    
    // Theme color
    echo '<meta name="theme-color" content="#d3600f">' . "\n";
    
    // Language
    echo '<meta name="language" content="es">' . "\n";
    
    // Geo tags
    echo '<meta name="geo.region" content="PE">' . "\n";
    echo '<meta name="geo.placename" content="Lima">' . "\n";
    
    // Mobile app
    echo '<meta name="mobile-web-app-capable" content="yes">' . "\n";
    echo '<meta name="apple-mobile-web-app-capable" content="yes">' . "\n";
    echo '<meta name="apple-mobile-web-app-status-bar-style" content="default">' . "\n";
}
add_action('wp_head', 'sueno_andino_additional_meta_tags', 2);
