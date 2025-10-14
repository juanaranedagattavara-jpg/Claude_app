<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="blog-section">
        <div class="container">
            <?php while (have_posts()): the_post(); ?>
                <article class="blog-card">
                    <div class="blog-content">
                        <h1><?php the_title(); ?></h1>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
