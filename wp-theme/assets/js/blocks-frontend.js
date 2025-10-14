/**
 * Scripts para bloques personalizados en el frontend
 */

(function($) {
    'use strict';

    // Inicializar cuando el DOM esté listo
    $(document).ready(function() {
        initBlockAnimations();
        initHeroScrollIndicator();
        initServiciosHover();
        initModalCalendario();
    });

    /**
     * Inicializar animaciones de bloques
     */
    function initBlockAnimations() {
        const blocks = $('.sueno-andino-block[data-animation]');
        
        if (blocks.length === 0) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    $(entry.target).addClass('animate');
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        blocks.each(function() {
            observer.observe(this);
        });
    }

    /**
     * Inicializar indicador de scroll del hero
     */
    function initHeroScrollIndicator() {
        const scrollIndicator = $('.hero-scroll-indicator');
        
        if (scrollIndicator.length === 0) return;

        // Smooth scroll al hacer clic en el indicador
        scrollIndicator.on('click', function() {
            $('html, body').animate({
                scrollTop: $(window).height()
            }, 800);
        });

        // Ocultar indicador cuando se hace scroll
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 100) {
                scrollIndicator.fadeOut();
            } else {
                scrollIndicator.fadeIn();
            }
        });
    }

    /**
     * Inicializar efectos hover para servicios
     */
    function initServiciosHover() {
        const servicioCards = $('.servicio-card');
        
        servicioCards.on('mouseenter', function() {
            $(this).addClass('hovered');
        }).on('mouseleave', function() {
            $(this).removeClass('hovered');
        });
    }

    /**
     * Inicializar modal de calendario
     */
    function initModalCalendario() {
        const modal = $('#modalCalendario');
        const openButton = $('[onclick="abrirModalCalendario()"]');
        const closeButton = $('[onclick="cerrarModalCalendario()"]');

        // Abrir modal
        openButton.on('click', function(e) {
            e.preventDefault();
            abrirModalCalendario();
        });

        // Cerrar modal
        closeButton.on('click', function(e) {
            e.preventDefault();
            cerrarModalCalendario();
        });

        // Cerrar modal al hacer clic fuera
        modal.on('click', function(e) {
            if (e.target === this) {
                cerrarModalCalendario();
            }
        });

        // Cerrar modal con tecla Escape
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && modal.is(':visible')) {
                cerrarModalCalendario();
            }
        });

        // Prevenir scroll del body cuando el modal está abierto
        $(document).on('wheel', function(e) {
            if (modal.is(':visible')) {
                e.preventDefault();
            }
        });
    }

    /**
     * Abrir modal de calendario
     */
    function abrirModalCalendario() {
        const modal = $('#modalCalendario');
        const modalContent = modal.find('> div');
        
        modal.show();
        $('body').addClass('modal-open');
        
        // Animación de entrada
        modal.css({
            'opacity': '0',
            'display': 'block'
        });
        
        modalContent.css({
            'transform': 'scale(0.9) translateY(20px)',
            'opacity': '0'
        });
        
        setTimeout(() => {
            modal.css('opacity', '1');
            modalContent.css({
                'transform': 'scale(1) translateY(0)',
                'opacity': '1',
                'transition': 'all 0.3s ease'
            });
        }, 10);
    }

    /**
     * Cerrar modal de calendario
     */
    function cerrarModalCalendario() {
        const modal = $('#modalCalendario');
        const modalContent = modal.find('> div');
        
        // Animación de salida
        modal.css('opacity', '0');
        modalContent.css({
            'transform': 'scale(0.9) translateY(20px)',
            'opacity': '0',
            'transition': 'all 0.3s ease'
        });
        
        setTimeout(() => {
            modal.hide();
            $('body').removeClass('modal-open');
        }, 300);
    }

    /**
     * Smooth scroll para enlaces internos
     */
    $('a[href^="#"]').on('click', function(e) {
        const target = $(this.getAttribute('href'));
        
        if (target.length) {
            e.preventDefault();
            
            $('html, body').animate({
                scrollTop: target.offset().top - 100
            }, 800);
        }
    });

    /**
     * Lazy loading para imágenes
     */
    function initLazyLoading() {
        const images = $('img[data-src]');
        
        if (images.length === 0) return;

        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.each(function() {
            imageObserver.observe(this);
        });
    }

    // Inicializar lazy loading
    initLazyLoading();

    /**
     * Parallax effect para hero background
     */
    function initParallax() {
        const heroBackground = $('.hero-background img');
        
        if (heroBackground.length === 0) return;

        $(window).on('scroll', function() {
            const scrolled = $(window).scrollTop();
            const parallax = scrolled * 0.5;
            
            heroBackground.css('transform', `translateY(${parallax}px)`);
        });
    }

    // Inicializar parallax
    initParallax();

    /**
     * Contador animado para estadísticas
     */
    function initCounterAnimation() {
        const counters = $('.hero-stat-number');
        
        if (counters.length === 0) return;

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = $(entry.target);
                    const target = parseInt(counter.text().replace(/[^\d]/g, ''));
                    
                    if (target > 0) {
                        animateCounter(counter, target);
                        counterObserver.unobserve(entry.target);
                    }
                }
            });
        });

        counters.each(function() {
            counterObserver.observe(this);
        });
    }

    /**
     * Animar contador
     */
    function animateCounter(element, target) {
        const duration = 2000;
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;

        const timer = setInterval(() => {
            current += increment;
            
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            
            element.text(Math.floor(current) + '+');
        }, 16);
    }

    // Inicializar contador animado
    initCounterAnimation();

})(jQuery);
