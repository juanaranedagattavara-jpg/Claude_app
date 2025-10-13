<?php
/**
 * The front page template
 *
 * @package SueñoAndino
 * @version 1.0.0
 */

get_header();
?>

<main id="main" class="site-main">
    <?php
    // Cargar secciones modulares
    get_template_part('template-parts/hero', 'section');
    get_template_part('template-parts/why-we-exist', 'section');
    get_template_part('template-parts/timeline', 'section');
    get_template_part('template-parts/services', 'section');
    get_template_part('template-parts/testimonials', 'section');
    get_template_part('template-parts/team', 'section');
    get_template_part('template-parts/contact', 'section');
    ?>
</main><!-- #main -->

<?php
get_footer();