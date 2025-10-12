<?php
/**
 * Template part for displaying posts
 *
 * @package SueñoAndino
 * @version 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
            <div class="entry-meta">
                <?php
                sueno_andino_posted_on();
                sueno_andino_posted_by();
                ?>
            </div>
            <?php
        endif;
        ?>
    </header>

    <?php sueno_andino_post_thumbnail(); ?>

    <div class="entry-content">
        <?php
        if (is_singular()) :
            the_content();
        else :
            the_excerpt();
        endif;

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'sueno-andino'),
            'after'  => '</div>',
        ));
        ?>
    </div>

    <footer class="entry-footer">
        <?php sueno_andino_entry_footer(); ?>
    </footer>
</article>
