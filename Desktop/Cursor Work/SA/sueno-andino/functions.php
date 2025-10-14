<?php
/**
 * Sueno Andino functions and definitions
 *
 * @package Sueno_Andino
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( ! defined( '_S_VERSION' ) ) {
    define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function sueno_andino_setup(): void {
    load_theme_textdomain( 'sueno-andino', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );

    register_nav_menus(
        array(
            'menu-1' => esc_html__( 'Primary', 'sueno-andino' ),
        )
    );

    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'editor-styles' );
    add_editor_style( 'style.css' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );
}
add_action( 'after_setup_theme', 'sueno_andino_setup' );

/**
 * Enqueue scripts and styles.
 */
function sueno_andino_scripts(): void {
    wp_enqueue_style( 'sueno-andino-style', get_stylesheet_uri(), array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'sueno_andino_scripts' );

/**
 * Add custom JavaScript to the footer.
 */
function sueno_andino_custom_js(): void {
    ?>
    <script>
        // Función para manejar el formulario de contacto
        function handleContactForm(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            
            // Simular envío del formulario
            alert(`¡Gracias ${name}! Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.`);
            
            // Limpiar el formulario
            event.target.reset();
        }
        
        // Función para mostrar el modal de la guía
        function showGuideModal() {
            document.getElementById('guideModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }
        
        // Función para cerrar el modal de la guía
        function closeGuideModal() {
            document.getElementById('guideModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }
        
        // Función para manejar el formulario de descarga de guía
        function handleGuideForm(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            
            // Simular descarga
            alert(`¡Perfecto ${name}! Tu guía se está descargando. También te hemos enviado un enlace de descarga a ${email}.`);
            
            // Cerrar el modal
            closeGuideModal();
            
            // Limpiar el formulario
            event.target.reset();
        }
        
        // Función para manejar el formulario del newsletter
        function handleNewsletterForm(event) {
            event.preventDefault();
            
            const email = event.target.querySelector('input[type="email"]').value;
            
            // Simular suscripción
            alert(`¡Gracias! Te has suscrito exitosamente con ${email}. Recibirás nuestros artículos semanalmente.`);
            
            // Limpiar el formulario
            event.target.reset();
        }
        
        // Agregar event listeners cuando el DOM esté listo
        document.addEventListener('DOMContentLoaded', function() {
            // Formulario de contacto
            const contactForm = document.querySelector('.contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', handleContactForm);
            }
            
            // Formulario de la guía
            const guideForm = document.querySelector('.guide-form-compact');
            if (guideForm) {
                guideForm.addEventListener('submit', handleGuideForm);
            }
            
            // Formulario del newsletter
            const newsletterForm = document.querySelector('.newsletter-form');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', handleNewsletterForm);
            }
            
            // Smooth scrolling para enlaces internos
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
    <?php
}
add_action( 'wp_footer', 'sueno_andino_custom_js' );
