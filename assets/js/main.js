/**
 * Sueño Andino - Main JavaScript
 * Optimized for performance and accessibility
 */

(function() {
    'use strict';

    // DOM Ready
    document.addEventListener('DOMContentLoaded', function() {
        initSmoothScrolling();
        initHeaderScroll();
        initLogoClick();
        initAccessibility();
        initPerformanceOptimizations();
        initGalleryCarousel();
    });

    /**
     * Smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        const links = document.querySelectorAll('a[href^="#"]');
        const header = document.querySelector('header');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    e.preventDefault();
                    
                    // Ocultar header al navegar a secciones específicas
                    if (targetId !== '#hero' && targetId !== '#') {
                        header.style.transform = 'translateY(-100%)';
                        header.style.transition = 'transform 0.3s ease';
                    }
                    
                    const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Focus management for accessibility
                    targetElement.focus();
                }
            });
        });
    }

    /**
     * Header scroll effects - Aparece solo al hacer scroll hacia arriba
     */
    function initHeaderScroll() {
        const header = document.querySelector('header');
        if (!header) return;

        let lastScrollY = window.scrollY;
        let ticking = false;
        let isHeaderVisible = true;

        function updateHeader() {
            const currentScrollY = window.scrollY;
            const scrollDifference = currentScrollY - lastScrollY;
            
            // Solo mostrar header si se hace scroll hacia arriba o está en la parte superior
            if (currentScrollY < 100) {
                // En la parte superior, siempre mostrar
                header.style.transform = 'translateY(0)';
                header.style.transition = 'transform 0.3s ease';
                isHeaderVisible = true;
            } else if (scrollDifference < -10 && !isHeaderVisible) {
                // Scroll hacia arriba, mostrar header
                header.style.transform = 'translateY(0)';
                header.style.transition = 'transform 0.3s ease';
                isHeaderVisible = true;
            } else if (scrollDifference > 10 && isHeaderVisible) {
                // Scroll hacia abajo, ocultar header
                header.style.transform = 'translateY(-100%)';
                header.style.transition = 'transform 0.3s ease';
                isHeaderVisible = false;
            }
            
            lastScrollY = currentScrollY;
            ticking = false;
        }

        function requestTick() {
            if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
            }
        }

        window.addEventListener('scroll', requestTick, { passive: true });
    }

    /**
     * Logo click handler - Navega al Hero
     */
    function initLogoClick() {
        const logo = document.querySelector('header img[alt*="Logo"]');
        if (!logo) return;

        // Hacer el logo clickeable
        logo.style.cursor = 'pointer';
        
        logo.addEventListener('click', function() {
            const heroSection = document.querySelector('#hero');
            if (heroSection) {
                // Mostrar header al volver al hero
                const header = document.querySelector('header');
                header.style.transform = 'translateY(0)';
                header.style.transition = 'transform 0.3s ease';
                
                // Scroll suave al hero
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }
        });
    }

    /**
     * Accessibility enhancements
     */
    function initAccessibility() {
        // Skip to main content functionality
        const skipLink = document.querySelector('a[href="#main-content"]');
        if (skipLink) {
            skipLink.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector('#main-content');
                if (target) {
                    target.focus();
                    target.scrollIntoView();
                }
            });
        }

        // Keyboard navigation for cards
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.setAttribute('tabindex', '0');
            
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    const link = card.querySelector('a');
                    if (link) {
                        e.preventDefault();
                        link.click();
                    }
                }
            });
        });

        // Focus management for modals and overlays
        const focusableElements = 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])';
        
        // Trap focus in modals (if any are added later)
        function trapFocus(element) {
            const focusableContent = element.querySelectorAll(focusableElements);
            const firstFocusableElement = focusableContent[0];
            const lastFocusableElement = focusableContent[focusableContent.length - 1];

            element.addEventListener('keydown', function(e) {
                if (e.key === 'Tab') {
                    if (e.shiftKey) {
                        if (document.activeElement === firstFocusableElement) {
                            lastFocusableElement.focus();
                            e.preventDefault();
                        }
                    } else {
                        if (document.activeElement === lastFocusableElement) {
                            firstFocusableElement.focus();
                            e.preventDefault();
                        }
                    }
                }
            });
        }
    }

    /**
     * Performance optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy loading for images (if any are added)
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            observer.unobserve(img);
                        }
                    }
                });
            });

            const lazyImages = document.querySelectorAll('img[data-src]');
            lazyImages.forEach(img => imageObserver.observe(img));
        }

        // Preload critical resources
        const criticalResources = [
            'assets/css/premium.css',
            'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap'
        ];

        criticalResources.forEach(resource => {
            const link = document.createElement('link');
            link.rel = 'preload';
            link.href = resource;
            link.as = 'style';
            document.head.appendChild(link);
        });
    }

    /**
     * Galería Carrusel - Rotación automática de fotos en 4 columnas fijas
     */
    function initGalleryCarousel() {
        // Array con todas las fotos de la galería (3-8)
        const fotosGaleria = [
            { src: 'assets/img/galeria3.jpg', alt: 'Taller de emprendimiento comunitario en los Andes' },
            { src: 'assets/img/galeria4.jpg', alt: 'Reunión comunitaria para planificación de proyectos' },
            { src: 'assets/img/galeria5.jpg', alt: 'Celebración de logros comunitarios en los Andes' },
            { src: 'assets/img/galeria6.jpg', alt: 'Paisaje andino con infraestructura comunitaria' },
            { src: 'assets/img/galeria7.jpg', alt: 'Proyecto de desarrollo comunitario en los Andes' },
            { src: 'assets/img/galeria8.jpg', alt: 'Comunidad andina trabajando en proyectos sostenibles' }
        ];

        let currentIndex = 0;
        let autoSlideInterval;

        // Función para mostrar un conjunto específico de fotos
        function mostrarSlide(index) {
            currentIndex = index;
            
            // Calcular qué fotos mostrar en cada columna
            for (let i = 1; i <= 4; i++) {
                const fotoIndex = (index + i - 1) % fotosGaleria.length;
                const img = document.getElementById(`foto-columna-${i}`);
                if (img) {
                    // Efecto de fade out/in
                    img.style.opacity = '0';
                    setTimeout(() => {
                        img.src = fotosGaleria[fotoIndex].src;
                        img.alt = fotosGaleria[fotoIndex].alt;
                        img.style.opacity = '1';
                    }, 250);
                }
            }
        }

        // Función para avanzar al siguiente slide
        function nextSlide() {
            const nextIndex = (currentIndex + 1) % 3; // 3 conjuntos diferentes
            mostrarSlide(nextIndex);
        }

        // Función para iniciar la rotación automática
        function startAutoSlide() {
            autoSlideInterval = setInterval(nextSlide, 3000); // Cambiar cada 3 segundos
        }

        // Función para detener la rotación automática
        function stopAutoSlide() {
            if (autoSlideInterval) {
                clearInterval(autoSlideInterval);
                autoSlideInterval = null;
            }
        }

        // Pausar carrusel al hacer hover en las columnas
        const columnas = document.querySelectorAll('.carrusel-columna');
        columnas.forEach(columna => {
            columna.addEventListener('mouseenter', stopAutoSlide);
            columna.addEventListener('mouseleave', startAutoSlide);
        });

        // Hacer la función mostrarSlide global (por si se necesita en el futuro)
        window.mostrarSlide = mostrarSlide;

        // Inicializar con el primer conjunto de fotos
        mostrarSlide(0);
        startAutoSlide();

        // Pausar carrusel cuando la página no está visible (optimización)
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopAutoSlide();
            } else {
                startAutoSlide();
            }
        });
    }

    /**
     * Utility functions
     */
    window.SuenoAndino = {
        // Smooth scroll to element
        scrollTo: function(elementId, offset = 0) {
            const element = document.querySelector(elementId);
            if (element) {
                const headerHeight = document.querySelector('header')?.offsetHeight || 0;
                const targetPosition = element.offsetTop - headerHeight - offset;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        },

        // Track analytics events (if analytics is added)
        track: function(event, data = {}) {
            if (typeof gtag !== 'undefined') {
                gtag('event', event, data);
            }
        },

        // Show notification
        notify: function(message, type = 'info') {
            // Simple notification system
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--primary-color);
                color: white;
                padding: 1rem 2rem;
                border-radius: 0.5rem;
                box-shadow: var(--shadow-lg);
                z-index: 1000;
                transform: translateX(100%);
                transition: transform 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.style.transform = 'translateX(0)';
            }, 100);
            
            // Remove after 3 seconds
            setTimeout(() => {
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => {
                    document.body.removeChild(notification);
                }, 300);
            }, 3000);
        }
    };

})();
