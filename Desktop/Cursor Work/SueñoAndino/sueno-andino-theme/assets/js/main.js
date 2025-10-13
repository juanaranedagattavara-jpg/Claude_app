/**
 * Sueño Andino Theme JavaScript - Modularizado y Optimizado
 * 
 * @package SueñoAndino
 * @version 1.0.0
 */

(function($) {
    'use strict';

    // ===== MÓDULO DE FORMULARIOS =====
    const Forms = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            // Formulario de contacto
            const contactForm = document.querySelector('form[onsubmit="handleContactForm(event)"]');
            if (contactForm) {
                contactForm.addEventListener('submit', this.handleContact.bind(this));
            }

            // Formulario de guía
            const guideForm = document.querySelector('.guide-form-compact');
            if (guideForm) {
                guideForm.addEventListener('submit', this.handleGuide.bind(this));
            }

            // Formulario de newsletter
            const newsletterForm = document.querySelector('form[onsubmit="handleNewsletterForm(event)"]');
            if (newsletterForm) {
                newsletterForm.addEventListener('submit', this.handleNewsletter.bind(this));
            }
        },

        handleContact: function(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            const message = formData.get('message');
            
            // Simular envío del formulario
            this.showNotification(`¡Gracias ${name}! Hemos recibido tu mensaje y nos pondremos en contacto contigo pronto.`, 'success');
            
            // Limpiar el formulario
            event.target.reset();
        },

        handleGuide: function(event) {
            event.preventDefault();
            
            const formData = new FormData(event.target);
            const name = formData.get('name');
            const email = formData.get('email');
            
            // Simular descarga
            this.showNotification(`¡Perfecto ${name}! Tu guía se está descargando. También te hemos enviado un enlace de descarga a ${email}.`, 'success');
            
            // Cerrar el modal
            Modal.close();
            
            // Limpiar el formulario
            event.target.reset();
        },

        handleNewsletter: function(event) {
            event.preventDefault();
            
            const email = event.target.querySelector('input[type="email"]').value;
            
            // Simular suscripción
            this.showNotification(`¡Gracias! Te has suscrito exitosamente con ${email}. Recibirás nuestros artículos semanalmente.`, 'success');
            
            // Limpiar el formulario
            event.target.reset();
        },

        showNotification: function(message, type = 'info') {
            // Crear notificación temporal
            const notification = document.createElement('div');
            notification.className = `notification notification-${type}`;
            notification.textContent = message;
            notification.style.cssText = `
                position: fixed;
                top: 20px;
                right: 20px;
                background: var(--sa-primary);
                color: white;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                z-index: 10000;
                animation: slideInRight 0.3s ease;
            `;
            
            document.body.appendChild(notification);
            
            // Remover después de 5 segundos
            setTimeout(() => {
                notification.style.animation = 'slideOutRight 0.3s ease';
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.parentNode.removeChild(notification);
                    }
                }, 300);
            }, 5000);
        }
    };

    // ===== MÓDULO DE MODAL =====
    const Modal = {
        init: function() {
            this.bindEvents();
        },

        bindEvents: function() {
            // Botones para abrir modal
            const guideButtons = document.querySelectorAll('a[onclick*="showGuideModal"], [data-modal="guide"]');
            guideButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.show();
                });
            });

            // Botones para cerrar modal
            const closeButtons = document.querySelectorAll('[onclick*="closeGuideModal"], [data-modal-close]');
            closeButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.close();
                });
            });

            // Cerrar modal al hacer clic fuera
            const modal = document.getElementById('guideModal');
            if (modal) {
                modal.addEventListener('click', (e) => {
                    if (e.target === modal) {
                        this.close();
                    }
                });
            }

            // Cerrar modal con tecla Escape
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    this.close();
                }
            });
        },

        show: function() {
            const modal = document.getElementById('guideModal');
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
                
                // Agregar clase para animación
                setTimeout(() => {
                    modal.classList.add('modal-active');
                }, 10);
            }
        },

        close: function() {
            const modal = document.getElementById('guideModal');
            if (modal) {
                modal.classList.remove('modal-active');
                
                setTimeout(() => {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }, 300);
            }
        }
    };

    // ===== MÓDULO DE NAVEGACIÓN =====
    const Navigation = {
        init: function() {
            this.initSmoothScrolling();
            this.initMobileMenu();
        },

        initSmoothScrolling: function() {
            const links = document.querySelectorAll('a[href^="#"]');
            links.forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = link.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);
                    
                    if (targetElement) {
                        const headerHeight = document.querySelector('.site-header').offsetHeight;
                        const targetPosition = targetElement.offsetTop - headerHeight - 20;
                        
                        window.scrollTo({
                            top: targetPosition,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        },

        initMobileMenu: function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const navMenu = document.querySelector('.nav-menu');
            
            if (menuToggle && navMenu) {
                menuToggle.addEventListener('click', () => {
                    const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
                    menuToggle.setAttribute('aria-expanded', !isExpanded);
                    navMenu.classList.toggle('active');
                    document.body.classList.toggle('menu-open');
                });

                // Cerrar menú al hacer clic en enlaces
                const menuLinks = navMenu.querySelectorAll('a');
                menuLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        navMenu.classList.remove('active');
                        menuToggle.setAttribute('aria-expanded', 'false');
                        document.body.classList.remove('menu-open');
                    });
                });
            }
        }
    };

    // ===== MÓDULO DE ANIMACIONES =====
    const Animations = {
        init: function() {
            this.initScrollAnimations();
            this.initStatsCounter();
        },

        initScrollAnimations: function() {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observar elementos que deben animarse
            const animateElements = document.querySelectorAll(
                '.service-card, .testimonial-card, .team-member, .blog-card, .anne-timeline-item, .stat-item'
            );
            
            animateElements.forEach(el => {
                observer.observe(el);
            });
        },

        initStatsCounter: function() {
            const statNumbers = document.querySelectorAll('.stat-number');
            
            const animateCounter = (element, target) => {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    element.textContent = Math.floor(current).toLocaleString();
                }, 20);
            };

            const statsObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const target = parseInt(entry.target.textContent.replace(/[^\d]/g, ''));
                        if (target) {
                            animateCounter(entry.target, target);
                        }
                        statsObserver.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            statNumbers.forEach(stat => {
                statsObserver.observe(stat);
            });
        }
    };

    // ===== MÓDULO DE RENDIMIENTO =====
    const Performance = {
        init: function() {
            this.lazyLoadImages();
            this.debounceScrollEvents();
        },

        lazyLoadImages: function() {
            if ('IntersectionObserver' in window) {
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

                const lazyImages = document.querySelectorAll('img[data-src]');
                lazyImages.forEach(img => imageObserver.observe(img));
            }
        },

        debounceScrollEvents: function() {
            let scrollTimer = null;
            
            window.addEventListener('scroll', () => {
                if (scrollTimer !== null) {
                    clearTimeout(scrollTimer);
                }
                scrollTimer = setTimeout(() => {
                    // Ejecutar funciones de scroll aquí si es necesario
                }, 150);
            });
        }
    };

    // ===== INICIALIZACIÓN PRINCIPAL =====
    function init() {
        // Verificar que jQuery esté disponible
        if (typeof $ === 'undefined') {
            console.warn('jQuery no está disponible. Algunas funcionalidades pueden no funcionar correctamente.');
        }

        // Inicializar todos los módulos
        Forms.init();
        Modal.init();
        Navigation.init();
        Animations.init();
        Performance.init();

        // Agregar estilos para animaciones
        addAnimationStyles();
    }

    // ===== ESTILOS DE ANIMACIÓN =====
    function addAnimationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideInRight {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOutRight {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
            
            .animate-in {
                animation: fadeInUp 0.6s ease forwards;
            }
            
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            .lazy {
                opacity: 0;
                transition: opacity 0.3s;
            }
            
            .lazy.loaded {
                opacity: 1;
            }
        `;
        document.head.appendChild(style);
    }

    // ===== EJECUTAR INICIALIZACIÓN =====
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // ===== EXPONER FUNCIONES GLOBALES =====
    // Para compatibilidad con onclick attributes
    window.handleContactForm = Forms.handleContact.bind(Forms);
    window.handleGuideForm = Forms.handleGuide.bind(Forms);
    window.handleNewsletterForm = Forms.handleNewsletter.bind(Forms);
    window.showGuideModal = Modal.show.bind(Modal);
    window.closeGuideModal = Modal.close.bind(Modal);

})(jQuery);