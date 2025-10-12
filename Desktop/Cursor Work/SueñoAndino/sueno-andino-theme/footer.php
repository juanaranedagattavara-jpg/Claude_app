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
                    <div class="footer-logo">
                        <div class="logo-icon">SA</div>
                    </div>
                    <div>
                        <div class="footer-title"><?php bloginfo('name'); ?></div>
                        <p class="footer-description"><?php bloginfo('description'); ?></p>
                    </div>
                </div>

                <div class="footer-section">
                    <h3><?php esc_html_e('Navegación', 'sueno-andino'); ?></h3>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class'     => 'footer-menu',
                        'container'      => false,
                        'depth'          => 1,
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

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
