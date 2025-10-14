<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preload" as="image" href="<?php echo get_template_directory_uri(); ?>/assets/img/hero-background.jpg">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background-color:#e5d5c0;">
    <?php wp_body_open(); ?>

    <!-- Header -->
    <header id="header" class="wp-block-group header-sticky">
        <div class="container" style="display:flex;justify-content:space-between;align-items:center">
            <!-- Logo -->
            <div style="display:flex;align-items:center">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-sa-blanco.png" 
                         alt="<?php bloginfo('name'); ?>" 
                         style="width:8rem;height:auto;object-fit:contain;max-height:6rem;"
                         loading="eager"
                         decoding="async">
                </a>
            </div>
            
            <!-- Navigation -->
            <nav class="nav-main" aria-label="Navegación principal">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class' => 'nav-menu',
                    'container' => false,
                    'fallback_cb' => false,
                ));
                ?>
            </nav>
        </div>
    </header>
