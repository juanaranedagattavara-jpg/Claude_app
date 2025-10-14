    <!-- Footer -->
    <footer class="wp-block-group" style="background-color:#f8f9fa;padding-top:2rem;padding-bottom:2rem;padding-left:1rem;padding-right:1rem">
        <div class="container">
            <div class="wp-block-columns" style="display:grid;grid-template-columns:repeat(3,1fr);gap:2rem;margin-bottom:2rem">
                <div class="wp-block-column">
                    <h3 style="font-size:1.25rem;margin:0 0 1rem 0"><?php bloginfo('name'); ?></h3>
                    <p style="font-size:0.875rem;margin:0">Transformando vidas a través de la educación y el desarrollo sostenible en los Andes.</p>
                </div>
                <div class="wp-block-column">
                    <h4 style="font-size:1rem;margin:0 0 1rem 0">Enlaces</h4>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer-menu',
                        'container' => false,
                        'fallback_cb' => false,
                    ));
                    ?>
                </div>
                <div class="wp-block-column">
                    <h4 style="font-size:1rem;margin:0 0 1rem 0">Contacto</h4>
                    <p style="font-size:0.875rem;margin:0">info@sueñoandino.com<br>+51 999 888 777</p>
                </div>
            </div>
            <hr style="margin:2rem 0 1rem 0;border:none;border-top:1px solid #ddd">
            <p style="text-align:center;font-size:0.75rem;margin:0">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Todos los derechos reservados.</p>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
