<?php
/**
 * Funciones de template para Sueño Andino
 * 
 * @package Sueño Andino
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Obtener el logo del sitio
 */
function sueno_andino_get_logo() {
    $custom_logo_id = get_theme_mod('custom_logo');
    if ($custom_logo_id) {
        return wp_get_attachment_image($custom_logo_id, 'full', false, array(
            'alt' => get_bloginfo('name'),
            'class' => 'site-logo'
        ));
    }
    
    // Logo por defecto
    return '<img src="' . get_template_directory_uri() . '/assets/img/logo-sa-blanco.png" 
                 alt="' . get_bloginfo('name') . ' - Transformando Vidas en los Andes" 
                 class="site-logo">';
}

/**
 * Obtener el menú de navegación principal
 */
function sueno_andino_get_main_nav() {
    if (has_nav_menu('primary')) {
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'nav-links',
            'fallback_cb'    => false,
        ));
    } else {
        // Menú por defecto si no hay menú configurado
        echo '<ul class="nav-links">';
        echo '<li><a href="#nosotros">Nosotros</a></li>';
        echo '<li><a href="#servicios">Servicios</a></li>';
        echo '<li><a href="#equipo">Equipo</a></li>';
        echo '<li><a href="#contacto">Contacto</a></li>';
        echo '</ul>';
    }
}

/**
 * Obtener el menú del footer
 */
function sueno_andino_get_footer_nav() {
    if (has_nav_menu('footer')) {
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'footer-links',
            'fallback_cb'    => false,
        ));
    } else {
        // Menú por defecto si no hay menú configurado
        echo '<ul class="footer-links">';
        echo '<li><a href="#nosotros">Nosotros</a></li>';
        echo '<li><a href="#servicios">Servicios</a></li>';
        echo '<li><a href="#equipo">Equipo</a></li>';
        echo '<li><a href="#contacto">Contacto</a></li>';
        echo '</ul>';
    }
}

/**
 * Obtener información de contacto
 */
function sueno_andino_get_contact_info() {
    return array(
        'email' => get_theme_mod('contact_email', 'contacto@suenoandino.org'),
        'phone' => get_theme_mod('contact_phone', '+51 999 888 777'),
        'address' => get_theme_mod('contact_address', 'Lima, Perú'),
        'whatsapp' => get_theme_mod('contact_whatsapp', 'https://wa.me/51999888777'),
    );
}

/**
 * Obtener redes sociales
 */
function sueno_andino_get_social_links() {
    return array(
        'facebook' => get_theme_mod('social_facebook', ''),
        'twitter' => get_theme_mod('social_twitter', ''),
        'instagram' => get_theme_mod('social_instagram', ''),
        'linkedin' => get_theme_mod('social_linkedin', ''),
        'youtube' => get_theme_mod('social_youtube', ''),
    );
}

/**
 * Obtener estadísticas de impacto
 */
function sueno_andino_get_impact_stats() {
    return array(
        array(
            'number' => get_theme_mod('stat_beneficiarios', '1,200+'),
            'label' => get_theme_mod('stat_beneficiarios_label', 'Personas Beneficiadas'),
        ),
        array(
            'number' => get_theme_mod('stat_comunidades', '25+'),
            'label' => get_theme_mod('stat_comunidades_label', 'Comunidades Atendidas'),
        ),
        array(
            'number' => get_theme_mod('stat_proyectos', '15+'),
            'label' => get_theme_mod('stat_proyectos_label', 'Proyectos Exitosos'),
        ),
        array(
            'number' => get_theme_mod('stat_satisfaccion', '98%'),
            'label' => get_theme_mod('stat_satisfaccion_label', 'Satisfacción'),
        ),
    );
}

/**
 * Obtener información del equipo
 */
function sueno_andino_get_team_members() {
    return array(
        'ejecutivo' => array(
            array(
                'nombre' => 'Pedro Smith',
                'cargo' => 'Director Ejecutivo',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Martín Araneda',
                'cargo' => 'Director Desarrollo Territorial',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Goran Ahumada',
                'cargo' => 'Director Emprendimiento',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Ana Rodríguez',
                'cargo' => 'Directora de Programas',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Carlos Mendoza',
                'cargo' => 'Director de Comunicaciones',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
        ),
        'directorio' => array(
            array(
                'nombre' => 'Dr. Roberto Silva',
                'cargo' => 'Presidente',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Dra. Carmen Mendoza',
                'cargo' => 'Vicepresidenta',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Ing. Miguel Torres',
                'cargo' => 'Tesorero',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
            array(
                'nombre' => 'Lic. Patricia Vega',
                'cargo' => 'Secretaria',
                'foto' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
            ),
        ),
    );
}

/**
 * Obtener casos de éxito
 */
function sueno_andino_get_success_cases() {
    return array(
        array(
            'titulo' => 'Comunidad de Huancavelica',
            'descripcion' => 'Gracias al programa de emprendimiento, pudimos crear una cooperativa de artesanías que ahora exporta a nivel nacional.',
            'autor' => 'María Quispe',
            'cargo' => 'Líder Comunitaria',
            'estadistica' => '+150%',
            'estadistica_label' => 'en ingresos familiares',
        ),
        array(
            'titulo' => 'Escuela Rural de Cusco',
            'descripcion' => 'Nuestros estudiantes ahora tienen acceso a tecnología educativa y metodologías modernas que los preparan para el futuro.',
            'autor' => 'Prof. Carlos Mamani',
            'cargo' => 'Director',
            'estadistica' => '95%',
            'estadistica_label' => 'de aprobación estudiantil',
        ),
        array(
            'titulo' => 'Empresa Minera Responsable',
            'descripcion' => 'El programa de responsabilidad social nos ayudó a crear un modelo de desarrollo sostenible que beneficia a toda la región.',
            'autor' => 'Ing. Ana Vargas',
            'cargo' => 'Gerente RSE',
            'estadistica' => '+300',
            'estadistica_label' => 'empleos locales',
        ),
    );
}

/**
 * Obtener aliados
 */
function sueno_andino_get_partners() {
    return array(
        array(
            'nombre' => 'Gobierno Regional',
            'logo' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
        ),
        array(
            'nombre' => 'Minera XYZ',
            'logo' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
        ),
        array(
            'nombre' => 'Fundación ABC',
            'logo' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
        ),
        array(
            'nombre' => 'ONG Def',
            'logo' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
        ),
        array(
            'nombre' => 'Universidad Nacional',
            'logo' => get_template_directory_uri() . '/assets/img/equipo-fondo.jpg',
        ),
    );
}

/**
 * Obtener galería de imágenes
 */
function sueno_andino_get_gallery() {
    return array(
        get_template_directory_uri() . '/assets/img/galeria1.jpg',
        get_template_directory_uri() . '/assets/img/galeria2.jpg',
        get_template_directory_uri() . '/assets/img/galeria3.jpg',
        get_template_directory_uri() . '/assets/img/galeria4.jpg',
        get_template_directory_uri() . '/assets/img/galeria5.jpg',
        get_template_directory_uri() . '/assets/img/galeria6.jpg',
        get_template_directory_uri() . '/assets/img/galeria7.jpg',
        get_template_directory_uri() . '/assets/img/galeria8.jpg',
    );
}

/**
 * Verificar si es la página de inicio
 */
function sueno_andino_is_front_page() {
    return is_front_page() || is_home();
}

/**
 * Obtener el título de la página
 */
function sueno_andino_get_page_title() {
    if (is_front_page() || is_home()) {
        return get_bloginfo('name');
    } elseif (is_singular()) {
        return get_the_title();
    } elseif (is_archive()) {
        return get_the_archive_title();
    } elseif (is_search()) {
        return sprintf(__('Search Results for: %s', 'sueno-andino'), get_search_query());
    } elseif (is_404()) {
        return __('Page Not Found', 'sueno-andino');
    }
    
    return get_bloginfo('name');
}

/**
 * Obtener la descripción de la página
 */
function sueno_andino_get_page_description() {
    if (is_front_page() || is_home()) {
        return get_bloginfo('description');
    } elseif (is_singular() && has_excerpt()) {
        return get_the_excerpt();
    } elseif (is_archive()) {
        return get_the_archive_description();
    }
    
    return get_bloginfo('description');
}
