<?php
/**
 * The main template file
 *
 * @package SueñoAndino
 * @version 1.0
 */

get_header(); ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    
    <style>
        /* ===== VARIABLES CSS ===== */
        :root {
            --sa-primary: <?php echo sueno_andino_get_primary_color(); ?>;
            --sa-accent: <?php echo sueno_andino_get_accent_color(); ?>;
            --sa-cloud: #f8f9fa;
            --sa-ink: #1a1a1a;
            --sa-text: #666;
            --sa-light: #ffffff;
            --sa-shadow: rgba(0, 0, 0, 0.1);
            --sa-shadow-hover: rgba(0, 0, 0, 0.15);
            --sa-gradient: linear-gradient(135deg, var(--sa-primary) 0%, var(--sa-accent) 100%);
            --sa-gradient-light: linear-gradient(135deg, rgba(14, 94, 111, 0.1) 0%, rgba(127, 176, 105, 0.1) 100%);
        }

        /* ===== CSS BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: var(--sa-ink);
            background-color: var(--sa-light);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ===== HEADER ===== */
        .site-header {
            background: var(--sa-light);
            box-shadow: 0 4px 20px var(--sa-shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 0;
            transition: all 0.3s ease;
        }

        .site-logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            color: var(--sa-ink);
        }

        .logo-icon {
            width: 45px;
            height: 45px;
            background: var(--sa-gradient);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1.3rem;
            box-shadow: 0 4px 15px rgba(14, 94, 111, 0.3);
            transition: all 0.3s ease;
        }

        .site-logo:hover .logo-icon {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(14, 94, 111, 0.4);
        }

        .site-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--sa-ink);
        }

        .main-navigation {
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 2rem;
        }

        .nav-menu a {
            color: var(--sa-ink);
            text-decoration: none;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease;
        }

        .nav-menu a:hover {
            color: var(--sa-primary);
            transform: translateY(-2px);
        }

        .btn {
            padding: 0.8rem 1.8rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: inline-block;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--sa-gradient);
            color: white;
            box-shadow: 0 4px 15px rgba(14, 94, 111, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(14, 94, 111, 0.4);
        }

        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, var(--sa-cloud) 0%, #ffffff 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            max-width: 1000px;
            margin: 0 auto;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            color: var(--sa-ink);
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-description {
            font-size: 1.25rem;
            color: var(--sa-ink);
            opacity: 0.8;
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-bottom: 4rem;
        }

        /* ===== HERO STATS ===== */
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 3rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .stat-item {
            text-align: center;
            flex: 1;
            min-width: 150px;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--sa-primary);
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            color: var(--sa-ink);
            opacity: 0.7;
            margin-top: 0.5rem;
        }

        /* ===== RESPONSIVE DESIGN ===== */
        @media (max-width: 768px) {
            .container {
                padding: 0 15px;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .main-navigation {
                display: flex;
                flex-direction: column;
                gap: 1rem;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }

            .hero-title {
                font-size: 2rem;
            }

            .hero-description {
                font-size: 1rem;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 100%;
                max-width: 300px;
            }

            .hero-stats {
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 1rem;
                flex-wrap: wrap;
            }

            .stat-item {
                flex: 1;
                min-width: 120px;
            }

            .stat-number {
                font-size: 2rem;
            }

            .stat-label {
                font-size: 0.8rem;
            }
        }
    </style>
</head>

<body <?php body_class(); ?>>

<!-- HEADER -->
<header class="site-header">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo home_url(); ?>" class="site-logo">
                <div class="logo-icon">SA</div>
                <div class="site-title">Sueño Andino</div>
            </a>
            
            <nav class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'      => 'nav-menu',
                    'container'       => false,
                    'fallback_cb'     => false,
                ));
                ?>
                <a href="#guia" class="btn btn-primary">Descarga Guía Gratuita</a>
            </nav>
        </div>
    </div>
</header>

<!-- HERO SECTION -->
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

<!-- CONTENIDO PRINCIPAL -->
<main id="main" class="site-main">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-container">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
                        </header>
                        
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>No se encontraron publicaciones.</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>

</body>
</html>
