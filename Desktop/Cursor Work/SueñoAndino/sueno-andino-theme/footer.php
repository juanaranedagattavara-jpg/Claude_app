<?php
/**
 * The template for displaying the footer
 *
 * @package SueñoAndino
 * @version 1.0
 */
?>

    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                        <div class="footer-logo">SA</div>
                        <span class="footer-title"><?php bloginfo('name'); ?></span>
                    </a>
                    <p class="footer-description">
                        <?php bloginfo('description'); ?>
                    </p>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e('Navegación', 'sueno-andino'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
                        'fallback_cb'    => 'sueno_andino_footer_fallback_menu',
                    ));
                    ?>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e('Contacto', 'sueno-andino'); ?></h3>
                    <ul class="footer-menu">
                        <li><?php esc_html_e('Lima, Perú', 'sueno-andino'); ?></li>
                        <li><?php esc_html_e('+51-999-888-777', 'sueno-andino'); ?></li>
                        <li><?php esc_html_e('hola@sueñoandino.com', 'sueno-andino'); ?></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Todos los derechos reservados.', 'sueno-andino'); ?></p>
            </div>
        </div>
    </footer>

    <!-- POPUP LEAD MAGNET COMPACTO -->
    <div id="guideModal" class="guide-modal" style="display: none;">
        <div class="modal-overlay" onclick="closeGuideModal()">
            <div class="modal-content" onclick="event.stopPropagation()">
                <div class="modal-header">
                    <div class="modal-icon">📚</div>
                    <h3><?php esc_html_e('¡Guía Gratuita!', 'sueno-andino'); ?></h3>
                    <p class="modal-subtitle"><?php esc_html_e('Metodologías Regenerativas para Comunidades Andinas', 'sueno-andino'); ?></p>
                    <button class="modal-close" onclick="closeGuideModal()">×</button>
                </div>
                <div class="modal-body">
                    <div class="guide-benefits-compact">
                        <div class="benefit-compact">✅ <?php esc_html_e('Metodologías paso a paso', 'sueno-andino'); ?></div>
                        <div class="benefit-compact">✅ <?php esc_html_e('Casos de éxito reales', 'sueno-andino'); ?></div>
                        <div class="benefit-compact">✅ <?php esc_html_e('Herramientas prácticas', 'sueno-andino'); ?></div>
                    </div>
                    
                    <form class="guide-form-compact" onsubmit="handleGuideForm(event)">
                        <div class="form-row">
                            <input type="text" name="name" placeholder="<?php esc_attr_e('Tu nombre', 'sueno-andino'); ?>" required="">
                            <input type="email" name="email" placeholder="<?php esc_attr_e('Email', 'sueno-andino'); ?>" required="">
                        </div>
                        <button type="submit" class="btn-download">
                            <span>📥</span> <?php esc_html_e('Descargar Guía', 'sueno-andino'); ?>
                        </button>
                        <p class="privacy-note">🔒 <?php esc_html_e('Privacidad garantizada', 'sueno-andino'); ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
