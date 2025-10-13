<?php
/**
 * Template part for Contact Section
 * 
 * @package SueñoAndino
 * @version 1.0.0
 */
?>

<section id="contacto" class="contact-section">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2><?php esc_html_e('Trabajemos Juntos', 'sueno-andino'); ?></h2>
                <p>
                    <?php esc_html_e('¿Tienes un proyecto en mente? Conversemos sobre cómo podemos trabajar juntos para transformar tu territorio.', 'sueno-andino'); ?>
                </p>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div>
                            <div class="contact-label"><?php esc_html_e('Ubicación', 'sueno-andino'); ?></div>
                            <div class="contact-value"><?php echo esc_html(get_theme_mod('contact_address', 'Lima, Perú')); ?></div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div>
                            <div class="contact-label"><?php esc_html_e('Teléfono', 'sueno-andino'); ?></div>
                            <div class="contact-value"><?php echo esc_html(get_theme_mod('contact_phone', '+51-999-888-777')); ?></div>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div>
                            <div class="contact-label"><?php esc_html_e('Email', 'sueno-andino'); ?></div>
                            <div class="contact-value"><?php echo esc_html(get_theme_mod('contact_email', 'hola@sueñoandino.com')); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <form onsubmit="handleContactForm(event)">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="<?php esc_attr_e('Tu nombre completo', 'sueno-andino'); ?>" required="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="<?php esc_attr_e('tu@email.com', 'sueno-andino'); ?>" required="">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="<?php esc_attr_e('Cuéntanos sobre tu proyecto...', 'sueno-andino'); ?>" required=""></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <?php esc_html_e('Enviar Mensaje', 'sueno-andino'); ?>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
