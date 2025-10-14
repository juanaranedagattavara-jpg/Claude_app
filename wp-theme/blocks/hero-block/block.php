<?php
/**
 * Hero Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? 'Transformando Vidas en los Andes';
$subtitle = $attributes['subtitle'] ?? 'Desarrollamos comunidades sostenibles a través de la educación, el emprendimiento y la regeneración ambiental en las montañas andinas.';
$backgroundImage = $attributes['backgroundImage'] ?? get_template_directory_uri() . '/assets/img/hero-background.jpg';
$buttonText = $attributes['buttonText'] ?? 'Conoce Nuestros Servicios';
$leadMagnetText = $attributes['leadMagnetText'] ?? 'Descarga Guía Gratuita';
$leadMagnetTitle = $attributes['leadMagnetTitle'] ?? 'Guía Gratuita: Desarrollo Sostenible en los Andes';
$leadMagnetDescription = $attributes['leadMagnetDescription'] ?? 'Descubre las claves para implementar proyectos de desarrollo sostenible en comunidades andinas.';

// Generar ID único para el modal
$modalId = 'leadMagnetModal_' . uniqid();
?>

<div class="wp-block-group hero-optimized" style="padding-top: 70px;">
    <!-- Imagen de fondo -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:0">
        <img src="<?php echo esc_url($backgroundImage); ?>" 
             alt="Paisaje andino regenerativo con montañas y comunidades" 
             style="width:100%;height:100%;object-fit:cover;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);"
             loading="eager"
             decoding="async">
    </div>
    
    <!-- Overlay para mejorar legibilidad -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(135deg, rgba(42,67,81,0.7) 0%, rgba(30,58,71,0.6) 100%);z-index:1"></div>
    
    <!-- Contenido principal -->
    <div style="position:relative;z-index:2;height:calc(150vh - 100px);margin-top:100px;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding:0 2rem;max-width:1200px;margin-left:auto;margin-right:auto">
        <!-- Título principal -->
        <h1 style="color:white;font-size:clamp(2.5rem, 5vw, 4rem);font-weight:800;line-height:1.1;margin:0 0 1.5rem 0;text-shadow:0 4px 8px rgba(0,0,0,0.3);padding:0 1rem;white-space:normal">
            <?php echo esc_html($title); ?>
        </h1>
        
        <!-- Subtítulo -->
        <p style="color:rgba(255,255,255,0.95);font-size:clamp(1.1rem, 2.5vw, 1.4rem);line-height:1.6;margin:0 0 3rem 0;max-width:800px;text-shadow:0 2px 4px rgba(0,0,0,0.3);white-space:normal">
            <?php echo esc_html($subtitle); ?>
        </p>
        
        <!-- Botones -->
        <div class="hero-buttons" style="display:flex;justify-content:center;align-items:center;gap:2rem;flex-wrap:nowrap;margin-bottom:6rem">
            <a href="#servicios" class="btn-primary" style="background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;padding:1rem 2.5rem;border-radius:0.75rem;text-decoration:none;font-weight:700;font-size:1rem;transition:all 0.4s ease;box-shadow:0 10px 25px -5px rgba(211,96,15,0.4);text-transform:uppercase;letter-spacing:0.05em;display:inline-block;min-width:220px;text-align:center" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 15px 30px -5px rgba(211,96,15,0.6)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(211,96,15,0.4)'">
                <?php echo esc_html($buttonText); ?>
            </a>
            
            <button id="leadMagnetBtn" style="background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);color:white;padding:1rem 2.5rem;border-radius:0.75rem;border:2px solid rgba(255,255,255,0.2);font-weight:700;font-size:1rem;transition:all 0.4s ease;box-shadow:0 10px 25px -5px rgba(42,67,81,0.4);text-transform:uppercase;letter-spacing:0.05em;cursor:pointer;min-width:220px;display:inline-block" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 15px 30px -5px rgba(42,67,81,0.6)';this.style.borderColor='rgba(255,255,255,0.4)';this.style.background='linear-gradient(135deg, #3a5561 0%, #2e4a57 100%)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(42,67,81,0.4)';this.style.borderColor='rgba(255,255,255,0.2)';this.style.background='linear-gradient(135deg, #2a4351 0%, #1e3a47 100%)'">
                <?php echo esc_html($leadMagnetText); ?>
            </button>
        </div>
    </div>
</div>

<!-- Modal Lead Magnet -->
<div id="<?php echo esc_attr($modalId); ?>" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:10000;backdrop-filter:blur(3px)">
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);width:85%;max-width:420px;background:rgba(255,255,255,0.6);backdrop-filter:blur(3px);border-radius:1.5rem;padding:2rem;box-shadow:0 20px 40px -12px rgba(0,0,0,0.25);border:1px solid rgba(255,255,255,0.2)">
        <button id="closeModal" style="position:absolute;top:1.5rem;right:1.5rem;background:none;border:none;font-size:1.5rem;cursor:pointer;color:#666;padding:0.5rem;transition:color 0.3s ease" onmouseover="this.style.color='#d3600f'" onmouseout="this.style.color='#666'">&times;</button>
        
        <div style="text-align:center;margin-bottom:1.5rem">
            <div style="width:50px;height:50px;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;margin:0 auto 1rem;display:flex;align-items:center;justify-content:center">
                <span style="color:white;font-size:1.5rem">📚</span>
            </div>
            <h3 style="margin:0 0 0.5rem 0;color:#2a4351;font-size:1.5rem;font-weight:700"><?php echo esc_html($leadMagnetTitle); ?></h3>
            <p style="margin:0;color:#666;font-size:0.95rem;line-height:1.4"><?php echo esc_html($leadMagnetDescription); ?></p>
        </div>
        
        <form id="leadMagnetForm" style="display:flex;flex-direction:column;gap:1rem">
            <div>
                <label for="nombre" style="display:block;margin-bottom:0.5rem;color:#2a4351;font-weight:600;font-size:0.85rem">Nombre completo *</label>
                <input type="text" id="nombre" name="nombre" required style="width:100%;padding:0.8rem 1rem;border:1.5px solid #e5d5c0;border-radius:0.5rem;font-size:0.9rem;transition:all 0.3s ease;box-sizing:border-box;background:#fafafa;outline:none" onfocus="this.style.borderColor='#d3600f';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(211,96,15,0.1)'" onblur="this.style.borderColor='#e5d5c0';this.style.background='#fafafa';this.style.boxShadow='none'">
                <div id="nombreError" style="color:#e53e3e;font-size:0.75rem;margin-top:0.2rem;display:none">El nombre es requerido</div>
            </div>
            
            <div>
                <label for="email" style="display:block;margin-bottom:0.5rem;color:#2a4351;font-weight:600;font-size:0.85rem">Email *</label>
                <input type="email" id="email" name="email" required style="width:100%;padding:0.8rem 1rem;border:1.5px solid #e5d5c0;border-radius:0.5rem;font-size:0.9rem;transition:all 0.3s ease;box-sizing:border-box;background:#fafafa;outline:none" onfocus="this.style.borderColor='#d3600f';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(211,96,15,0.1)'" onblur="this.style.borderColor='#e5d5c0';this.style.background='#fafafa';this.style.boxShadow='none'">
                <div id="emailError" style="color:#e53e3e;font-size:0.75rem;margin-top:0.2rem;display:none">Ingresa un email válido</div>
            </div>
            
            <div>
                <label for="telefono" style="display:block;margin-bottom:0.5rem;color:#2a4351;font-weight:600;font-size:0.85rem">Teléfono (opcional)</label>
                <input type="tel" id="telefono" name="telefono" style="width:100%;padding:0.8rem 1rem;border:1.5px solid #e5d5c0;border-radius:0.5rem;font-size:0.9rem;transition:all 0.3s ease;box-sizing:border-box;background:#fafafa;outline:none" onfocus="this.style.borderColor='#d3600f';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(211,96,15,0.1)'" onblur="this.style.borderColor='#e5d5c0';this.style.background='#fafafa';this.style.boxShadow='none'">
            </div>
            
            <button type="submit" style="background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;padding:0.8rem 1.5rem;border:none;border-radius:0.5rem;font-size:0.9rem;font-weight:600;cursor:pointer;transition:all 0.3s ease;text-transform:uppercase;letter-spacing:0.05em;margin-top:0.5rem" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 20px rgba(211,96,15,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                Descargar Guía Gratuita
            </button>
        </form>
        
        <div id="leadMagnetSuccess" style="margin-top:1rem;padding:1rem;background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:0.75rem;color:#16a34a;font-size:0.9rem;display:none;text-align:center">
            ¡Gracias! Te hemos enviado la guía a tu email.
        </div>
        
        <p style="margin:1rem 0 0 0;font-size:0.75rem;color:#666;text-align:center">
            Al descargar, aceptas recibir comunicaciones de Sueño Andino. Puedes darte de baja en cualquier momento.
        </p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('<?php echo esc_js($modalId); ?>');
    const openBtn = document.getElementById('leadMagnetBtn');
    const closeBtn = document.getElementById('closeModal');
    const form = document.getElementById('leadMagnetForm');
    
    if (openBtn && modal) {
        openBtn.addEventListener('click', function() {
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    }
    
    if (closeBtn && modal) {
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        });
    }
    
    if (modal) {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.style.display = 'none';
                document.body.style.overflow = 'auto';
            }
        });
    }
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nombre = document.getElementById('nombre').value.trim();
            const email = document.getElementById('email').value.trim();
            const nombreError = document.getElementById('nombreError');
            const emailError = document.getElementById('emailError');
            const success = document.getElementById('leadMagnetSuccess');
            
            // Reset errors
            nombreError.style.display = 'none';
            emailError.style.display = 'none';
            
            let isValid = true;
            
            if (!nombre) {
                nombreError.style.display = 'block';
                isValid = false;
            }
            
            if (!email || !email.includes('@')) {
                emailError.style.display = 'block';
                isValid = false;
            }
            
            if (isValid) {
                // Simular envío exitoso
                form.style.display = 'none';
                success.style.display = 'block';
                
                // Cerrar modal después de 3 segundos
                setTimeout(function() {
                    modal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                    form.style.display = 'flex';
                    success.style.display = 'none';
                    form.reset();
                }, 3000);
            }
        });
    }
});
</script>

