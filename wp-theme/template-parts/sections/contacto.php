<?php
/**
 * Template part para la sección Contacto
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Contacto Section -->
<div class="wp-block-group section-optimized" style="background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);box-shadow:0 -10px 30px rgba(0,0,0,0.1);scroll-margin-top:100px" id="contacto">
    <div style="max-width:800px;margin:0 auto;padding:0 1rem">
        <!-- Header -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em">Contacto</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(3rem, 6vw, 4.5rem);font-weight:700;color:white;margin:0 0 2rem 0;line-height:1.1;font-family:'Playfair Display',serif">
                Trabajemos Juntos
            </h2>
            <p style="font-size:clamp(1.25rem, 3vw, 1.5rem);color:rgba(255,255,255,0.8);line-height:1.6;margin:0 auto;max-width:600px;font-weight:300">
                ¿Listo para transformar tu territorio? Conectemos y exploremos cómo podemos impulsar el desarrollo regenerativo en tu región.
            </p>
        </div>

        <!-- Formulario de contacto simplificado -->
        <div style="max-width:600px;margin:0 auto">
            <form style="background:rgba(255,255,255,0.15);backdrop-filter:blur(15px);border-radius:1.5rem;padding:3rem;border:1px solid rgba(255,255,255,0.3);box-shadow:0 20px 40px rgba(0,0,0,0.2)">
                <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.5rem;margin-bottom:2rem">
                    <div>
                        <label style="display:block;color:white;font-weight:500;margin-bottom:0.5rem;font-size:0.875rem">Nombre Completo</label>
                        <input type="text" required class="form-input" placeholder="Tu nombre completo">
                    </div>
                    
                    <div>
                        <label style="display:block;color:white;font-weight:500;margin-bottom:0.5rem;font-size:0.875rem">Email</label>
                        <input type="email" required class="form-input" placeholder="tu@email.com">
                    </div>
                    
                    <div>
                        <label style="display:block;color:white;font-weight:500;margin-bottom:0.5rem;font-size:0.875rem">Mensaje</label>
                        <textarea required rows="5" class="form-input" placeholder="Cuéntanos sobre tu proyecto y cómo podemos ayudarte..."></textarea>
                    </div>
                </div>
                
                <button type="submit" class="btn-optimized" style="width:100%;padding:1.25rem 2rem;font-size:1.125rem;font-weight:700;text-transform:uppercase;letter-spacing:0.05em">
                    Enviar Mensaje
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Modal de Google Calendar -->
<div id="modalCalendario" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);backdrop-filter:blur(10px);z-index:1000;padding:2rem;box-sizing:border-box;">
    <div style="background:white;border-radius:1.5rem;max-width:1000px;margin:0 auto;height:90vh;position:relative;box-shadow:0 25px 50px rgba(0,0,0,0.3);overflow:hidden;display:flex;flex-direction:column;">
        <!-- Header del modal -->
        <div style="background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);padding:2rem;color:white;position:relative;z-index:10;">
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <div>
                    <h2 style="font-size:clamp(1.5rem, 3vw, 2rem);font-weight:700;margin:0 0 0.5rem 0;font-family:'Playfair Display',serif;color:white;">
                        Agenda tu Consulta
                    </h2>
                    <p style="font-size:1rem;color:rgba(255,255,255,0.8);margin:0;font-weight:300;">
                        Selecciona una fecha y hora que funcione para ti
                    </p>
                </div>
                <button onclick="cerrarModalCalendario()" style="background:rgba(255,255,255,0.1);color:white;border:1px solid rgba(255,255,255,0.2);border-radius:50%;width:50px;height:50px;cursor:pointer;font-size:1.5rem;display:flex;align-items:center;justify-content:center;transition:all 0.3s ease;backdrop-filter:blur(10px);" onmouseover="this.style.background='rgba(255,255,255,0.2)';this.style.transform='scale(1.05)'" onmouseout="this.style.background='rgba(255,255,255,0.1)';this.style.transform='scale(1)'">
                    ×
                </button>
            </div>
        </div>
        
        <!-- Contenido del calendario -->
        <div style="flex:1;position:relative;background:#f8f9fa;">
            <iframe src="https://calendar.google.com/calendar/embed?src=c&ctz=America%2FLima&mode=WEEK&showTabs=0&showCalendars=0&showTz=0&height=600&wkst=1&bgcolor=%23ffffff&src=YOUR_EMAIL%40gmail.com&color=%23d3600f" 
                    style="border:0;width:100%;height:100%;border-radius:0;" 
                    frameborder="0" 
                    scrolling="no">
            </iframe>
        </div>
        
        <!-- Footer del modal -->
        <div style="background:white;padding:1.5rem 2rem;border-top:1px solid #e5e7eb;text-align:center;">
            <p style="font-size:0.875rem;color:#6b7280;margin:0 0 1rem 0;">
                ¿Prefieres contactarnos directamente? 
                <a href="https://wa.me/51999888777" target="_blank" style="color:#d3600f;text-decoration:none;font-weight:600;transition:color 0.3s ease;" onmouseover="this.style.color='#c16134'" onmouseout="this.style.color='#d3600f'">Escríbenos por WhatsApp</a>
            </p>
            <div style="display:flex;gap:1rem;justify-content:center;align-items:center;">
                <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:#6b7280;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    Reserva confirmada automáticamente
                </div>
                <div style="display:flex;align-items:center;gap:0.5rem;font-size:0.8rem;color:#6b7280;">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    Recordatorio por email
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript para el modal de calendario -->
<script>
    function abrirModalCalendario() {
        const modal = document.getElementById('modalCalendario');
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
        
        // Animación de entrada suave
        modal.style.opacity = '0';
        modal.querySelector('div').style.transform = 'scale(0.9) translateY(20px)';
        
        setTimeout(() => {
            modal.style.transition = 'opacity 0.3s ease';
            modal.style.opacity = '1';
            modal.querySelector('div').style.transition = 'transform 0.3s ease';
            modal.querySelector('div').style.transform = 'scale(1) translateY(0)';
        }, 10);
    }

    function cerrarModalCalendario() {
        const modal = document.getElementById('modalCalendario');
        
        // Animación de salida suave
        modal.style.transition = 'opacity 0.3s ease';
        modal.style.opacity = '0';
        modal.querySelector('div').style.transition = 'transform 0.3s ease';
        modal.querySelector('div').style.transform = 'scale(0.9) translateY(20px)';
        
        setTimeout(() => {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Cerrar modal al hacer clic fuera del contenido
    document.getElementById('modalCalendario').addEventListener('click', function(e) {
        if (e.target === this) {
            cerrarModalCalendario();
        }
    });

    // Cerrar modal con tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('modalCalendario');
            if (modal.style.display === 'block') {
                cerrarModalCalendario();
            }
        }
    });

    // Prevenir scroll del body cuando el modal está abierto
    document.addEventListener('wheel', function(e) {
        const modal = document.getElementById('modalCalendario');
        if (modal.style.display === 'block') {
            e.preventDefault();
        }
    }, { passive: false });
</script>
