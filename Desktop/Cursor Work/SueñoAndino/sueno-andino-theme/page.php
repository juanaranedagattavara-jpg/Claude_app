<?php
/**
 * The template for displaying all pages
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while (have_posts()) :
            the_post();
            
            // Si la página está construida con Elementor, usar Elementor
            if (\Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()) {
                the_content();
            } else {
                // Si no está construida con Elementor, usar template tradicional
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'sueno-andino'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <?php if (get_edit_post_link()) : ?>
                        <footer class="entry-footer">
                            <?php
                            edit_post_link(
                                sprintf(
                                    wp_kses(
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
                            ?>
                        </footer>
                    <?php endif; ?>
                </article>
                <?php
            }
        endwhile;
        ?>
    </main>
</div>

<?php
get_footer();
