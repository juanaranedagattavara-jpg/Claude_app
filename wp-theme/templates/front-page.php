<?php
/**
 * Template para la página de inicio
 * 
 * @package Sueño Andino
 */

get_header(); ?>

<main id="site-content" role="main">
    <?php
    // Verificar si hay contenido de bloques
    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            
            // Si hay contenido de bloques, mostrarlo
            if ( get_the_content() ) {
                the_content();
            } else {
                // Si no hay contenido, mostrar las secciones por defecto
                get_template_part( 'template-parts/sections/hero' );
                get_template_part( 'template-parts/sections/golden-circle' );
                get_template_part( 'template-parts/sections/timeline' );
                get_template_part( 'template-parts/sections/servicios' );
                get_template_part( 'template-parts/sections/equipo' );
                get_template_part( 'template-parts/sections/casos-exito' );
                get_template_part( 'template-parts/sections/contacto' );
            }
        }
    } else {
        // Si no hay posts, mostrar las secciones por defecto
        get_template_part( 'template-parts/sections/hero' );
        get_template_part( 'template-parts/sections/golden-circle' );
        get_template_part( 'template-parts/sections/timeline' );
        get_template_part( 'template-parts/sections/servicios' );
        get_template_part( 'template-parts/sections/equipo' );
        get_template_part( 'template-parts/sections/casos-exito' );
        get_template_part( 'template-parts/sections/contacto' );
    }
    ?>
</main>

<?php get_footer(); ?>
