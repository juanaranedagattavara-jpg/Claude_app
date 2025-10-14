<?php
/**
 * Template principal del tema Sueño Andino
 */

get_header(); ?>

<main id="main" class="site-main">
    <?php
    // Hero Section
    get_template_part('template-parts/sections/hero');
    
    // Golden Circle Section
    get_template_part('template-parts/sections/golden-circle');
    
    // Timeline Section
    get_template_part('template-parts/sections/timeline');
    
    // Servicios Section
    get_template_part('template-parts/sections/servicios');
    
    // Equipo Section
    get_template_part('template-parts/sections/equipo');
    
    // Casos de Éxito Section
    get_template_part('template-parts/sections/casos-exito');
    
    // Contacto Section
    get_template_part('template-parts/sections/contacto');
    ?>
</main>

<?php
get_footer();
