<?php
/**
 * The template for displaying archive pages
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if (have_posts()) : ?>
            <header class="page-header">
                <?php
                the_archive_title('<h1 class="page-title">', '</h1>');
                the_archive_description('<div class="archive-description">', '</div>');
                ?>
            </header>

            <div class="posts-container">
                <?php
                while (have_posts()) :
                    the_post();

                    /*
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_type());

                endwhile;
                ?>
            </div>

            <?php
            the_posts_navigation(array(
                'prev_text' => esc_html__('Older posts', 'sueno-andino'),
                'next_text' => esc_html__('Newer posts', 'sueno-andino'),
            ));

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>
    </main>
</div>

<?php
get_sidebar();
get_footer();
