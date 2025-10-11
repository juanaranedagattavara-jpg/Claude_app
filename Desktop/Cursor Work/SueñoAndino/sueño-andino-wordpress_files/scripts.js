/* ===== SUEÑO ANDINO - JAVASCRIPT COMÚN ===== */
/* Archivo consolidado para optimización del proyecto */

// ===== FUNCIONES DEL POPUP LEAD MAGNET =====
function showGuideModal() {
    document.getElementById('guideModal').style.display = 'block';
    document.body.style.overflow = 'hidden';
}

function closeGuideModal() {
    document.getElementById('guideModal').style.display = 'none';
    document.body.style.overflow = 'auto';
}

// ===== INICIALIZACIÓN DEL POPUP =====
function initPopup() {
    // Cerrar modal al hacer clic fuera
    const modal = document.getElementById('guideModal');
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                closeGuideModal();
            }
        });
    }

    // Form handling
    const form = document.getElementById('guideForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalHTML = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<span>Enviando...</span>';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('¡Guía descargada exitosamente! Revisa tu email.');
                closeGuideModal();
                this.reset();
                submitBtn.innerHTML = originalHTML;
                submitBtn.disabled = false;
            }, 1500);
        });
    }

    // Cerrar con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeGuideModal();
        }
    });

    // Mostrar popup automáticamente después de 10 segundos (solo en página principal)
    if (window.location.pathname.includes('sueño-andino-wordpress.html') || 
        window.location.pathname === '/' || 
        window.location.pathname === '/index.html') {
        setTimeout(() => {
            if (!sessionStorage.getItem('popupShown')) {
                showGuideModal();
                sessionStorage.setItem('popupShown', 'true');
            }
        }, 10000);
    }
}

// ===== SMOOTH SCROLLING =====
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            }
        });
    });
}

// ===== FORMULARIOS =====
function initForms() {
    // Newsletter form
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('¡Suscripción exitosa!');
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
    }

    // Contact form
    const contactForm = document.querySelector('.contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.textContent;
            
            submitBtn.textContent = 'Enviando...';
            submitBtn.disabled = true;
            
            setTimeout(() => {
                alert('¡Mensaje enviado exitosamente!');
                this.reset();
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }, 1500);
        });
    }
}

// ===== ANIMACIONES DE SCROLL =====
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);

    // Observar elementos con clase 'fade-in'
    document.querySelectorAll('.fade-in').forEach(el => {
        observer.observe(el);
    });

    // Observar elementos con clase 'slide-in'
    document.querySelectorAll('.slide-in').forEach(el => {
        observer.observe(el);
    });
}

// ===== INICIALIZACIÓN GENERAL =====
document.addEventListener('DOMContentLoaded', function() {
    initPopup();
    initSmoothScroll();
    initForms();
    initScrollAnimations();
});

// ===== FUNCIONES GLOBALES =====
window.showGuideModal = showGuideModal;
window.closeGuideModal = closeGuideModal;
