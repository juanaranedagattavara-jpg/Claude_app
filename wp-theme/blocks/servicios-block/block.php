<?php
/**
 * Servicios Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? 'Soluciones Especializadas';
$subtitle = $attributes['subtitle'] ?? 'Desarrollamos programas integrales que combinan metodologías probadas con innovación constante para cada tipo de organización.';
$services = $attributes['services'] ?? [];
$ctaTitle = $attributes['ctaTitle'] ?? '¿Listo para Transformar tu Comunidad?';
$ctaDescription = $attributes['ctaDescription'] ?? 'Descubre cómo nuestros servicios pueden impulsar el desarrollo regenerativo en tu comunidad o empresa.';
$ctaButton = $attributes['ctaButton'] ?? 'Agendar Consulta';

// Generar ID único para el modal
$modalId = 'modalCalendario_' . uniqid();
?>

<div class="wp-block-group section-optimized" style="background-color:#ffffff;scroll-margin-top:100px" id="servicios">
    <div style="max-width:1400px;margin:0 auto;padding:0 2rem">
        <!-- Header elegante -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem;background:rgba(211,96,15,0.08);padding:0.625rem 1.75rem;border-radius:2.5rem;border:1px solid rgba(211,96,15,0.15)">
                <span style="color:#d3600f;font-weight:600;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em">Nuestros Servicios</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(2.75rem, 5.5vw, 3.75rem);font-weight:400;color:#2a4351;margin:0 0 1.75rem 0;line-height:1.15;font-family:'Playfair Display',serif;letter-spacing:-0.015em">
                <?php echo esc_html($title); ?>
            </h2>
            <p style="font-size:clamp(1.125rem, 2.5vw, 1.375rem);color:#6b6b6b;line-height:1.6;margin:0;max-width:800px;margin-left:auto;margin-right:auto;font-weight:300">
                <?php echo esc_html($subtitle); ?>
            </p>
        </div>
        
        <!-- Servicios en grid elegante -->
        <div class="servicios-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:3rem;margin-bottom:5rem">
            <style>
                @media (min-width: 768px) {
                    .servicios-grid {
                        grid-template-columns: repeat(3, 1fr) !important;
                        gap: 4rem !important;
                    }
                }
            </style>
            
            <?php foreach ($services as $index => $service): ?>
            <div style="position:relative;group">
                <div style="background:<?php echo esc_attr($service['color'] ?? '#2a4351'); ?>;border-radius:2rem;padding:3rem 2.5rem;height:100%;box-shadow:0 0 0 1px rgba(0,0,0,0.04);transition:all 0.6s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(42,67,81,0.2);position:relative;overflow:hidden" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 40px 80px -12px rgba(0,0,0,0.15), 0 0 0 1px rgba(211,96,15,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 0 0 1px rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo sutil -->
                    <div style="position:absolute;top:-2rem;right:-2rem;width:8rem;height:8rem;background:linear-gradient(135deg, rgba(211,96,15,0.03) 0%, transparent 60%);border-radius:50%;z-index:0"></div>
                    
                    <!-- Icono minimalista -->
                    <div style="width:3.5rem;height:3.5rem;background:rgba(211,96,15,0.08);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;position:relative;z-index:1">
                        <span style="font-size:1.5rem"><?php echo esc_html($service['icon'] ?? '📋'); ?></span>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="position:relative;z-index:1">
                        <h3 style="font-size:1.5rem;font-weight:700;color:white;margin:0 0 1.5rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">
                            <?php echo esc_html($service['title'] ?? 'Servicio'); ?>
                        </h3>
                        <p style="color:rgba(255,255,255,0.9);line-height:1.6;margin:0 0 2rem 0;font-size:1rem;font-weight:400;letter-spacing:-0.005em">
                            <?php echo esc_html($service['description'] ?? 'Descripción del servicio'); ?>
                        </p>
                        
                        <!-- Lista de características -->
                        <?php if (!empty($service['features'])): ?>
                        <ul style="list-style:none;padding:0;margin:0 0 2rem 0">
                            <?php foreach ($service['features'] as $feature): ?>
                            <li style="display:flex;align-items:center;margin-bottom:0.75rem;color:rgba(255,255,255,0.8);font-size:0.9rem">
                                <span style="width:0.5rem;height:0.5rem;background:#d3600f;border-radius:50%;margin-right:0.75rem;flex-shrink:0"></span>
                                <?php echo esc_html($feature); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        
                        <!-- Botón de acción -->
                        <button style="background:rgba(255,255,255,0.1);color:white;border:1px solid rgba(255,255,255,0.2);padding:0.75rem 1.5rem;border-radius:0.75rem;font-weight:600;font-size:0.9rem;cursor:pointer;transition:all 0.3s ease;backdrop-filter:blur(10px)" onmouseover="this.style.background='rgba(255,255,255,0.2)';this.style.borderColor='rgba(255,255,255,0.4)'" onmouseout="this.style.background='rgba(255,255,255,0.1)';this.style.borderColor='rgba(255,255,255,0.2)'">
                            Conocer Más
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- CTA Section -->
        <div style="text-align:center;padding:4rem 2rem;background:linear-gradient(135deg, rgba(42,67,81,0.05) 0%, rgba(211,96,15,0.05) 100%);border-radius:2rem;border:1px solid rgba(211,96,15,0.1)">
            <h3 style="font-size:clamp(1.75rem, 3vw, 2.25rem);font-weight:700;color:#2a4351;margin:0 0 1.5rem 0;line-height:1.2;font-family:'Playfair Display',serif">
                <?php echo esc_html($ctaTitle); ?>
            </h3>
            <p style="font-size:clamp(1rem, 2vw, 1.125rem);color:#6b6b6b;line-height:1.6;margin:0 0 2rem 0;max-width:600px;margin-left:auto;margin-right:auto">
                <?php echo esc_html($ctaDescription); ?>
            </p>
            <button onclick="abrirModalCalendario()" style="display:inline-block;padding:0.75rem 1.5rem;background-color:white;color:#d3600f;border:none;border-radius:0.5rem;text-decoration:none;font-weight:500;font-size:0.85rem;transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);letter-spacing:0.01em;cursor:pointer;" onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 8px 20px -4px rgba(255,255,255,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                <?php echo esc_html($ctaButton); ?>
            </button>
        </div>
    </div>
</div>

<!-- Modal de Calendario -->
<div id="<?php echo esc_attr($modalId); ?>" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.8);backdrop-filter:blur(10px);z-index:1000;padding:2rem;box-sizing:border-box;">
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);width:90%;max-width:500px;background:white;border-radius:1.5rem;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25)">
        <button id="closeModalCalendario" style="position:absolute;top:1rem;right:1rem;background:none;border:none;font-size:1.5rem;cursor:pointer;color:#666;padding:0.5rem;transition:color 0.3s ease" onmouseover="this.style.color='#d3600f'" onmouseout="this.style.color='#666'">&times;</button>
        
        <div style="text-align:center;margin-bottom:2rem">
            <h3 style="color:#2a4351;font-size:1.5rem;font-weight:700;margin:0 0 1rem 0">Agendar Consulta</h3>
            <p style="color:#666;font-size:1rem;margin:0">Selecciona una fecha y hora para tu consulta gratuita</p>
        </div>
        
        <div style="text-align:center;padding:2rem;background:#f8f9fa;border-radius:1rem;border:2px dashed #d3600f">
            <div style="font-size:3rem;margin-bottom:1rem">📅</div>
            <p style="color:#666;margin:0">Integración con calendario próximamente</p>
            <p style="color:#d3600f;font-size:0.9rem;margin:0.5rem 0 0 0">Contacta directamente: info@sueñoandino.com</p>
        </div>
    </div>
</div>

<script>
function abrirModalCalendario() {
    const modal = document.getElementById('<?php echo esc_js($modalId); ?>');
    if (modal) {
        modal.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('<?php echo esc_js($modalId); ?>');
    const closeBtn = document.getElementById('closeModalCalendario');
    
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
});
</script>

