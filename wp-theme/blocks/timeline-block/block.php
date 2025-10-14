<?php
/**
 * Timeline Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? 'Hitos Transformadores';
$subtitle = $attributes['subtitle'] ?? 'Seis años de impacto regenerativo en las comunidades andinas.';
$backgroundImage = $attributes['backgroundImage'] ?? get_template_directory_uri() . '/assets/img/timeline-background.jpg';
$timelineItems = $attributes['timelineItems'] ?? [];
?>

<div class="wp-block-group timeline-section" style="position:relative;background-color:#ffffff;background-image:url('<?php echo esc_url($backgroundImage); ?>');background-size:cover;background-position:center;background-repeat:no-repeat;scroll-margin-top:100px;min-height:120vh;padding:8rem 0">
    <!-- Overlay 15% para 85% de nitidez -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(255,255,255,0.15);z-index:1"></div>
    
    <!-- Cuadro decorativo borroso con bordes circulares -->
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);width:92%;max-width:1100px;height:auto;min-height:85vh;background:rgba(255,255,255,0.12);backdrop-filter:blur(15px);border-radius:2.5rem;border:1px solid rgba(255,255,255,0.2);z-index:1.5;box-shadow:0 25px 50px rgba(0,0,0,0.15);padding:4rem 3rem;"></div>
    
    <div style="max-width:1100px;margin:0 auto;padding:0 3rem;position:relative;z-index:2;display:flex;flex-direction:column;justify-content:center;min-height:85vh">
        <!-- Header compacto -->
        <div style="text-align:center;margin-bottom:2rem">
            <div style="display:inline-block;margin-bottom:1rem;background:rgba(201,169,110,0.1);padding:0.5rem 1.5rem;border-radius:2rem;border:1px solid rgba(201,169,110,0.2)">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Nuestra Historia</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(2.25rem, 4.5vw, 3rem);font-weight:700;color:#2a4351;margin:0 0 1rem 0;line-height:1.1;font-family:'Playfair Display',serif;text-shadow:0 2px 4px rgba(0,0,0,0.1);">
                <?php echo esc_html($title); ?>
            </h2>
            <p style="font-size:clamp(1rem, 2.2vw, 1.125rem);color:#374151;line-height:1.6;margin:0 auto;max-width:600px;font-weight:400;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                <?php echo esc_html($subtitle); ?>
            </p>
        </div>
        
        <!-- Timeline Items -->
        <div style="position:relative;z-index:2">
            <?php foreach ($timelineItems as $index => $item): ?>
            <div style="display:flex;align-items:flex-start;gap:1.25rem;position:relative;z-index:2;margin-bottom:2rem">
                <!-- Año -->
                <div style="flex-shrink:0;width:3.5rem;text-align:center">
                    <div style="width:2.5rem;height:2.5rem;background-color:<?php echo esc_attr($item['color'] ?? '#d3600f'); ?>;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;box-shadow:0 3px 6px -1px rgba(0,0,0,0.1);margin:0 auto">
                        <?php echo esc_html($item['shortYear'] ?? substr($item['year'] ?? '', -2)); ?>
                    </div>
                    <div style="margin-top:0.25rem;font-size:0.7rem;color:<?php echo esc_attr($item['color'] ?? '#d3600f'); ?>;font-weight:600"><?php echo esc_html($item['year'] ?? ''); ?></div>
                </div>
                
                <!-- Contenido -->
                <div style="flex:1;padding-top:0.25rem">
                    <h3 style="font-size:1.125rem;font-weight:700;color:#2a4351;margin:0 0 0.25rem 0;line-height:1.3;text-shadow:0 1px 2px rgba(0,0,0,0.1);">
                        <?php echo esc_html($item['title'] ?? ''); ?>
                    </h3>
                    <p style="color:#374151;line-height:1.4;margin:0;font-size:0.875rem;font-weight:500;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                        <?php echo esc_html($item['description'] ?? ''); ?>
                    </p>
                </div>
            </div>
            
            <!-- Línea conectora (excepto el último elemento) -->
            <?php if ($index < count($timelineItems) - 1): ?>
            <div style="position:absolute;left:1.75rem;top:3.5rem;width:2px;height:2rem;background:linear-gradient(180deg, <?php echo esc_attr($item['color'] ?? '#d3600f'); ?> 0%, <?php echo esc_attr($timelineItems[$index + 1]['color'] ?? '#d3600f'); ?> 100%);z-index:1"></div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<style>
/* Timeline Responsive */
@media (max-width: 768px) {
    .timeline-section {
        padding: 4rem 0 !important;
        min-height: 100vh !important;
    }
    
    .timeline-section > div[style*="width:92%"] {
        width: 95% !important;
        padding: 2.5rem 1.5rem !important;
        min-height: 75vh !important;
    }
    
    .timeline-section .timeline-content {
        padding: 0 1.5rem !important;
        min-height: 75vh !important;
    }
}

@media (max-width: 480px) {
    .timeline-section > div[style*="width:92%"] {
        width: 98% !important;
        padding: 2rem 1rem !important;
        border-radius: 1.5rem !important;
        min-height: 80vh !important;
    }
    
    .timeline-section .timeline-content {
        padding: 0 1rem !important;
        min-height: 80vh !important;
    }
}
</style>
