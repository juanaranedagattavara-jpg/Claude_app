/**
 * Sueño Andino Theme JavaScript
 * 
 * @package SueñoAndino
 * @version 1.0
 */

(function($) {
    'use strict';

    // Smooth scrolling para enlaces internos
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });

    // Toggle del menú móvil
    $('.menu-toggle').click(function() {
        $(this).toggleClass('active');
        $('.main-navigation').toggleClass('active');
    });

    // Cerrar menú móvil al hacer clic en un enlace
    $('.nav-menu a').click(function() {
        $('.menu-toggle').removeClass('active');
        $('.main-navigation').removeClass('active');
    });

    // Animación de números en las estadísticas
    function animateNumbers() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var countTo = $this.attr('data-count');
            
            $({ countNum: $this.text() }).animate({
                countNum: countTo
            }, {
                duration: 2000,
                easing: 'linear',
                step: function() {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function() {
                    $this.text(this.countNum);
                }
            });
        });
    }

    // Trigger animación cuando las estadísticas son visibles
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var height = $(window).height();
        var statsOffset = $('.hero-stats').offset().top;
        
        if (scroll + height > statsOffset && !$('.stat-number').hasClass('animated')) {
            $('.stat-number').addClass('animated');
            animateNumbers();
        }
    });

    // Formulario de newsletter
    $('.newsletter-form').submit(function(e) {
        e.preventDefault();
        
        var email = $(this).find('input[type="email"]').val();
        
        if (email) {
            // Aquí puedes agregar la lógica para enviar el email
            alert('¡Gracias por suscribirte! Te mantendremos informado sobre nuestros artículos.');
            $(this)[0].reset();
        }
    });

    // Formulario de contacto
    $('.contact-form').submit(function(e) {
        e.preventDefault();
        
        var formData = {
            name: $(this).find('input[name="name"]').val(),
            email: $(this).find('input[name="email"]').val(),
            message: $(this).find('textarea[name="message"]').val()
        };
        
        if (formData.name && formData.email && formData.message) {
            // Aquí puedes agregar la lógica para enviar el formulario
            alert('¡Mensaje enviado! Te contactaremos pronto.');
            $(this)[0].reset();
        } else {
            alert('Por favor, completa todos los campos.');
        }
    });

    // Popup de guía gratuita
    $('a[href="#guia"]').click(function(e) {
        e.preventDefault();
        
        // Crear popup
        var popup = $('<div class="guide-popup"><div class="popup-content"><h3>Descarga tu Guía Gratuita</h3><p>Recibe nuestra guía completa sobre desarrollo territorial regenerativo</p><form class="guide-form"><input type="text" name="name" placeholder="Tu nombre" required><input type="email" name="email" placeholder="Tu email" required><button type="submit">Descargar Guía</button></form><button class="close-popup">×</button></div></div>');
        
        $('body').append(popup);
        popup.fadeIn();
        
        // Cerrar popup
        $('.close-popup, .guide-popup').click(function(e) {
            if (e.target === this) {
                popup.fadeOut(function() {
                    popup.remove();
                });
            }
        });
        
        // Enviar formulario de guía
        $('.guide-form').submit(function(e) {
            e.preventDefault();
            
            var name = $(this).find('input[name="name"]').val();
            var email = $(this).find('input[name="email"]').val();
            
            if (name && email) {
                alert('¡Gracias! Tu guía será enviada a tu correo electrónico.');
                popup.fadeOut(function() {
                    popup.remove();
                });
            }
        });
    });

    // Efectos de hover en las tarjetas
    $('.timeline-item, .service-card, .testimonial-card').hover(
        function() {
            $(this).addClass('hovered');
        },
        function() {
            $(this).removeClass('hovered');
        }
    );

})(jQuery);
