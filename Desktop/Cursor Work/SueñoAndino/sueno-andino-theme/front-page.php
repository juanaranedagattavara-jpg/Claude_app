<?php
/**
 * The front page template file
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Si la página de inicio está construida con Elementor, usar Elementor
        if (\Elementor\Plugin::$instance->documents->get(get_the_ID())->is_built_with_elementor()) {
            the_content();
        } else {
            // Si no está construida con Elementor, mostrar contenido por defecto
            ?>
            <section class="hero-section">
                <div class="container">
                    <div class="hero-content">
                        <h1 class="hero-title">DESARROLLO TERRITORIAL REGENERATIVO DESDE Y HACIA LATINOAMÉRICA</h1>
                        <p class="hero-description">Impulsamos proyectos de desarrollo territorial que devuelven vitalidad a los ecosistemas, fortalecen comunidades y generan prosperidad consciente y regenerativa.</p>
                        
                        <div class="hero-buttons">
                            <a href="#servicios" class="btn btn-primary">Conoce Nuestros Servicios</a>
                            <a href="#guia" class="btn btn-primary">Descarga Guía Gratuita</a>
                        </div>
                        
                        <div class="hero-stats">
                            <div class="stat-item">
                                <span class="stat-number">1,200+</span>
                                <span class="stat-label">Personas Beneficiadas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">25+</span>
                                <span class="stat-label">Comunidades Atendidas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">15+</span>
                                <span class="stat-label">Proyectos Exitosos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">98%</span>
                                <span class="stat-label">Satisfacción</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="timeline-section">
                <div class="container">
                    <div class="section-header">
                        <h2>Nuestra Historia</h2>
                        <p>Descubre a través de estos momentos importantes los eventos que han marcado nuestro camino de transformación territorial regenerativa</p>
                    </div>
                    <div class="anne-timeline">
                        <div class="anne-timeline-item">
                            <div class="anne-timeline-image">
                                <div class="image-placeholder">
                                    <div class="placeholder-content">
                                        <div class="placeholder-icon">🌱</div>
                                        <p>Fundación de Sueño Andino</p>
                                    </div>
                                </div>
                            </div>
                            <div class="anne-timeline-dot"></div>
                            <div class="anne-year">2020</div>
                            <div class="anne-timeline-content">
                                <h3>Nacimiento de Sueño Andino</h3>
                                <p>Nacimiento de nuestra organización con la visión clara de transformar territorios a través de metodologías regenerativas y participación comunitaria activa.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <?php
        }
        ?>
    </main>
</div>

<?php
get_footer();
