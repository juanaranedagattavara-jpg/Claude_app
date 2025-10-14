<?php
/**
 * Testimonios Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? 'Casos de Éxito';
$subtitle = $attributes['subtitle'] ?? 'Historias reales de transformación en las comunidades andinas.';
$backgroundImage = $attributes['backgroundImage'] ?? get_template_directory_uri() . '/assets/img/fondo-casosexito.jpg';
$testimonios = $attributes['testimonios'] ?? [];
?>

<div class="wp-block-group testimonios-section" style="background:linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);background-image:url('<?php echo esc_url($backgroundImage); ?>');background-size:cover;background-position:center;background-repeat:no-repeat;position:relative;scroll-margin-top:100px">
    <!-- Overlay para mejorar legibilidad -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,249,250,0.8) 100%);z-index:1"></div>
    
    <!-- Contenido -->
    <div style="position:relative;z-index:2">
        <div style="max-width:1400px;margin:0 auto;padding:0 1rem">
            <!-- Header -->
            <div style="text-align:center;margin-bottom:6rem">
                <div style="display:inline-block;margin-bottom:1.5rem;background:rgba(211,96,15,0.08);padding:0.625rem 1.75rem;border-radius:2.5rem;border:1px solid rgba(211,96,15,0.15)">
                    <span style="color:#d3600f;font-weight:600;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em">Testimonios</span>
                </div>
                <h2 class="wp-block-heading" style="font-size:clamp(2.5rem, 5vw, 3.5rem);font-weight:700;color:#2a4351;margin:0 0 1.5rem 0;line-height:1.1;font-family:'Playfair Display',serif;letter-spacing:-0.015em">
                    <?php echo esc_html($title); ?>
                </h2>
                <p style="font-size:clamp(1.125rem, 2.5vw, 1.375rem);color:#6b6b6b;line-height:1.6;margin:0;max-width:800px;margin-left:auto;margin-right:auto;font-weight:300">
                    <?php echo esc_html($subtitle); ?>
                </p>
            </div>
            
            <!-- Testimonios Grid -->
            <div class="testimonios-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:2rem;margin-bottom:5rem">
                <style>
                    @media (min-width: 768px) {
                        .testimonios-grid {
                            grid-template-columns: repeat(3, 1fr) !important;
                        }
                    }
                </style>
                
                <?php foreach ($testimonios as $index => $testimonio): ?>
                <div style="position:relative">
                    <div style="background:white;border-radius:1.5rem;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);border:1px solid #f3f4f6;height:100%;transition:all 0.5s ease" onmouseover="this.style.transform='translateY(-8px)';this.style.boxShadow='0 35px 60px -12px rgba(0,0,0,0.35)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 25px 50px -12px rgba(0,0,0,0.25)'">
                        <div style="text-align:center;margin-bottom:1.5rem">
                            <div style="width:4rem;height:4rem;background:linear-gradient(135deg, <?php echo esc_attr($testimonio['color'] ?? '#d3600f'); ?> 0%, <?php echo esc_attr($testimonio['color'] ?? '#d3600f'); ?> 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                                <span style="color:white;font-weight:700;font-size:1.25rem"><?php echo esc_html($testimonio['statistic'] ?? ''); ?></span>
                            </div>
                            <h3 style="font-size:1.75rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0"><?php echo esc_html($testimonio['title'] ?? ''); ?></h3>
                            <p style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;margin:0"><?php echo esc_html($testimonio['statisticLabel'] ?? ''); ?></p>
                        </div>
                        <blockquote style="color:#6b7280;line-height:1.6;margin:0 0 1.5rem 0;font-style:italic;text-align:center;font-size:1rem">
                            "<?php echo esc_html($testimonio['quote'] ?? ''); ?>"
                        </blockquote>
                        <div style="border-top:1px solid #f3f4f6;padding-top:1rem;text-align:center">
                            <div style="font-weight:600;color:#2a4351;font-size:1rem"><?php echo esc_html($testimonio['author'] ?? ''); ?></div>
                            <div style="font-size:0.875rem;color:#6b7280"><?php echo esc_html($testimonio['position'] ?? ''); ?></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<style>
/* Testimonios Responsive */
@media (max-width: 768px) {
    .testimonios-grid {
        grid-template-columns: 1fr !important;
        gap: 1.5rem !important;
    }
    
    .testimonios-section .testimonios-grid > div {
        margin-bottom: 1.5rem;
    }
}

@media (max-width: 480px) {
    .testimonios-section .testimonios-grid > div > div {
        padding: 1.5rem;
    }
    
    .testimonios-section .testimonios-grid h3 {
        font-size: 1.5rem !important;
    }
    
    .testimonios-section .testimonios-grid blockquote {
        font-size: 0.9rem !important;
    }
}
</style>
