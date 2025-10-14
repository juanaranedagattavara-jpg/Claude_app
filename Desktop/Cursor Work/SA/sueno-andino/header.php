<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <!-- HEADER -->
    <header class="site-header">
        <div class="container">
            <div class="header-content">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo">
                    <div class="logo-icon">SA</div>
                    <span class="site-title"><?php bloginfo( 'name' ); ?></span>
                </a>

                <nav class="main-navigation">
                    <ul class="nav-menu">
                        <li><a href="#servicios">Servicios</a></li>
                        <li><a href="#nosotros">Nosotros</a></li>
                        <li><a href="#equipo">Equipo</a></li>
                        <li><a href="#contacto">Contacto</a></li>
                        <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>">Blog</a></li>
                    </ul>
                    <a href="#" onclick="showGuideModal(); return false;" class="btn btn-secondary">Descarga Guía Gratuita</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">
                    DESARROLLO TERRITORIAL REGENERATIVO DESDE Y HACIA LATINOAMÉRICA
                </h1>
                <p class="hero-description">
                    Impulsamos proyectos de desarrollo territorial que devuelven
                    vitalidad a los ecosistemas, fortalecen comunidades y generan
                    prosperidad consciente y regenerativa.
                </p>
                <div class="hero-buttons">
                    <a href="#servicios" class="btn btn-primary">Conoce Nuestros Servicios</a>
                    <a href="#" onclick="showGuideModal(); return false;" class="btn btn-secondary">Descarga Guía Gratuita</a>
                </div>
                <div class="hero-stats">
                    <div class="stat-item">
                        <div class="stat-number">1,200+</div>
                        <div class="stat-label">Personas Beneficiadas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">25+</div>
                        <div class="stat-label">Comunidades Atendidas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">15+</div>
                        <div class="stat-label">Proyectos Exitosos</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">98%</div>
                        <div class="stat-label">Satisfacción</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
