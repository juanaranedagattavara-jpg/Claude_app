<?php
/**
 * Template part for Hero Section
 * 
 * @package SueñoAndino
 * @version 1.0.0
 */
?>

<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <h1 class="hero-title">
                <?php echo esc_html(get_theme_mod('hero_title', 'DESARROLLO TERRITORIAL REGENERATIVO DESDE Y HACIA LATINOAMÉRICA')); ?>
            </h1>
            <p class="hero-description">
                <?php echo esc_html(get_theme_mod('hero_description', 'Impulsamos proyectos de desarrollo territorial que devuelven vitalidad a los ecosistemas, fortalecen comunidades y generan prosperidad consciente y regenerativa.')); ?>
            </p>
            <div class="hero-buttons">
                <a href="#servicios" class="btn btn-primary"><?php esc_html_e('Conoce Nuestros Servicios', 'sueno-andino'); ?></a>
                <a href="#" onclick="showGuideModal(); return false;" class="btn btn-secondary"><?php esc_html_e('Descarga Guía Gratuita', 'sueno-andino'); ?></a>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_1_number', '1,200+')); ?></div>
                    <div class="stat-label"><?php echo esc_html(get_theme_mod('stat_1_label', 'Personas Beneficiadas')); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_2_number', '25+')); ?></div>
                    <div class="stat-label"><?php echo esc_html(get_theme_mod('stat_2_label', 'Comunidades Atendidas')); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_3_number', '15+')); ?></div>
                    <div class="stat-label"><?php echo esc_html(get_theme_mod('stat_3_label', 'Proyectos Exitosos')); ?></div>
                </div>
                <div class="stat-item">
                    <div class="stat-number"><?php echo esc_html(get_theme_mod('stat_4_number', '98%')); ?></div>
                    <div class="stat-label"><?php echo esc_html(get_theme_mod('stat_4_label', 'Satisfacción')); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
