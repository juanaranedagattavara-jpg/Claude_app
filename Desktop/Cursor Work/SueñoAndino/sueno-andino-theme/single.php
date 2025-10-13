<?php
/**
 * The template for displaying all single posts
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <div class="entry-meta">
                        <span class="posted-on">
                            <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                <?php echo get_the_date(); ?>
                            </time>
                        </span>
                        <span class="byline">
                            <?php esc_html_e('por', 'sueno-andino'); ?> 
                            <span class="author vcard">
                                <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo get_the_author(); ?>
                                </a>
                            </span>
                        </span>
                        <?php if (has_category()) : ?>
                            <span class="cat-links">
                                <?php esc_html_e('en', 'sueno-andino'); ?> 
                                <?php the_category(', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Páginas:', 'sueno-andino'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php if (has_tag()) : ?>
                        <div class="tag-links">
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                                __('Editar <span class="screen-reader-text">%s</span>', 'sueno-andino'),
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
            </article>

            <?php
            // Navegación de posts
            the_post_navigation(array(
                'prev_text' => '<span class="nav-subtitle">' . esc_html__('Anterior:', 'sueno-andino') . '</span> <span class="nav-title">%title</span>',
                'next_text' => '<span class="nav-subtitle">' . esc_html__('Siguiente:', 'sueno-andino') . '</span> <span class="nav-title">%title</span>',
            ));
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();