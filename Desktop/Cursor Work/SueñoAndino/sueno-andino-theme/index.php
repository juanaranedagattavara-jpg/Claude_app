<?php
/**
 * The main template file
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header();
?>

<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>
                        <header class="entry-header">
                            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
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
                            </div>
                        </header>

                        <div class="entry-content">
                            <?php
                            if (is_home() || is_archive()) {
                                the_excerpt();
                            } else {
                                the_content();
                            }
                            ?>
                        </div>

                        <footer class="entry-footer">
                            <?php if (is_home() || is_archive()) : ?>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Leer más →', 'sueno-andino'); ?>
                                </a>
                            <?php endif; ?>
                        </footer>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php
            // Paginación
            the_posts_pagination(array(
                'prev_text' => __('← Anterior', 'sueno-andino'),
                'next_text' => __('Siguiente →', 'sueno-andino'),
            ));
            ?>

        <?php else : ?>
            <div class="no-posts">
                <h2><?php esc_html_e('No se encontraron publicaciones', 'sueno-andino'); ?></h2>
                <p><?php esc_html_e('Lo sentimos, no hay contenido disponible en este momento.', 'sueno-andino'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();