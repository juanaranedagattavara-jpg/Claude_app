<?php get_header(); ?>

<main id="primary" class="site-main">
    <section class="blog-section">
        <div class="container">
            <div class="section-header">
                <h2>Blog</h2>
                <p>Artículos sobre desarrollo territorial regenerativo</p>
            </div>
            <div class="blog-grid">
                <?php if (have_posts()): while (have_posts()): the_post(); ?>
                    <div class="blog-card">
                        <div class="blog-image">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else: ?>
                                <div class="image-placeholder">📝</div>
                            <?php endif; ?>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                                <span class="blog-category"><?php echo get_the_category()[0]->name ?? 'General'; ?></span>
                            </div>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Leer más →</a>
                        </div>
                    </div>
                <?php endwhile; else: ?>
                    <div class="blog-card">
                        <div class="blog-content">
                            <h3>No hay artículos disponibles</h3>
                            <p>Próximamente publicaremos contenido sobre desarrollo territorial regenerativo.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
