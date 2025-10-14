<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="blog-section">
        <div class="container">
            <?php while (have_posts()): the_post(); ?>
                <article class="blog-card">
                    <div class="blog-image">
                        <?php if (has_post_thumbnail()): ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php else: ?>
                            <div class="image-placeholder">📝</div>
                        <?php endif; ?>
                    </div>
                    <div class="blog-content">
                        <div class="blog-meta">
                            <span class="blog-date"><?php echo get_the_date(); ?></span>
                            <span class="blog-category"><?php echo get_the_category()[0]->name ?? 'General'; ?></span>
                        </div>
                        <h1><?php the_title(); ?></h1>
                        <div class="post-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </article>
                
                <nav class="post-navigation">
                    <div class="nav-previous">
                        <?php previous_post_link('%link', '← Artículo Anterior'); ?>
                    </div>
                    <div class="nav-next">
                        <?php next_post_link('%link', 'Siguiente Artículo →'); ?>
                    </div>
                </nav>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
