<?php
/**
 * Golden Circle Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? '¿Por qué Sueño Andino?';
$subtitle = $attributes['subtitle'] ?? 'Nuestra misión es transformar vidas a través de la educación y el desarrollo sostenible en los Andes.';
$whyTitle = $attributes['whyTitle'] ?? '¿Por qué?';
$whyDescription = $attributes['whyDescription'] ?? 'Creemos que cada comunidad andina tiene el potencial de convertirse en un modelo de desarrollo sostenible.';
$howTitle = $attributes['howTitle'] ?? '¿Cómo?';
$howDescription = $attributes['howDescription'] ?? 'A través de programas educativos, emprendimiento social y proyectos de regeneración ambiental.';
$whatTitle = $attributes['whatTitle'] ?? '¿Qué?';
$whatDescription = $attributes['whatDescription'] ?? 'Desarrollamos comunidades prósperas y sostenibles en las montañas andinas.';
$newsletterTitle = $attributes['newsletterTitle'] ?? 'Mantente Conectado';
$newsletterDescription = $attributes['newsletterDescription'] ?? 'Recibe actualizaciones sobre nuestros proyectos y oportunidades de colaboración.';
$newsletterPlaceholder = $attributes['newsletterPlaceholder'] ?? 'tu@email.com';
$newsletterButton = $attributes['newsletterButton'] ?? 'Suscribirse';

// Generar ID único para el formulario
$formId = 'newsletterForm_' . uniqid();
?>

<div class="wp-block-group golden-circle-optimized" id="nosotros">
    <!-- Elemento decorativo de fondo sutil -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:radial-gradient(circle at 20% 80%, rgba(211,96,15,0.02) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(42,67,81,0.02) 0%, transparent 50%);z-index:0"></div>
    
    <div style="max-width:1400px;margin:0 auto;padding:0 2rem;position:relative;z-index:1">
        <!-- Header minimalista -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem;background:rgba(211,96,15,0.08);padding:0.625rem 1.75rem;border-radius:2.5rem;border:1px solid rgba(211,96,15,0.15)">
                <span style="color:#d3600f;font-weight:600;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em">Nuestra Filosofía</span>
            </div>
            <h2 style="color:#2a4351;font-size:clamp(2.5rem, 4vw, 3.5rem);font-weight:800;margin:0 0 1.5rem 0;line-height:1.1">
                <?php echo esc_html($title); ?>
            </h2>
            <p style="color:#666;font-size:clamp(1.1rem, 2vw, 1.3rem);line-height:1.6;margin:0;max-width:800px;margin-left:auto;margin-right:auto">
                <?php echo esc_html($subtitle); ?>
            </p>
        </div>
        
        <!-- Golden Circle Grid -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(300px, 1fr));gap:3rem;margin-bottom:6rem">
            <!-- ¿Por qué? -->
            <div style="text-align:center;padding:2rem;background:rgba(255,255,255,0.8);border-radius:1.5rem;border:1px solid rgba(211,96,15,0.1);box-shadow:0 10px 30px rgba(0,0,0,0.05);transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                <div style="width:80px;height:80px;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;margin:0 auto 1.5rem;display:flex;align-items:center;justify-content:center">
                    <span style="color:white;font-size:2rem">🎯</span>
                </div>
                <h3 style="color:#2a4351;font-size:1.5rem;font-weight:700;margin:0 0 1rem 0"><?php echo esc_html($whyTitle); ?></h3>
                <p style="color:#666;font-size:1rem;line-height:1.6;margin:0"><?php echo esc_html($whyDescription); ?></p>
            </div>
            
            <!-- ¿Cómo? -->
            <div style="text-align:center;padding:2rem;background:rgba(255,255,255,0.8);border-radius:1.5rem;border:1px solid rgba(42,67,81,0.1);box-shadow:0 10px 30px rgba(0,0,0,0.05);transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                <div style="width:80px;height:80px;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;margin:0 auto 1.5rem;display:flex;align-items:center;justify-content:center">
                    <span style="color:white;font-size:2rem">⚙️</span>
                </div>
                <h3 style="color:#2a4351;font-size:1.5rem;font-weight:700;margin:0 0 1rem 0"><?php echo esc_html($howTitle); ?></h3>
                <p style="color:#666;font-size:1rem;line-height:1.6;margin:0"><?php echo esc_html($howDescription); ?></p>
            </div>
            
            <!-- ¿Qué? -->
            <div style="text-align:center;padding:2rem;background:rgba(255,255,255,0.8);border-radius:1.5rem;border:1px solid rgba(193,97,52,0.1);box-shadow:0 10px 30px rgba(0,0,0,0.05);transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-5px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 30px rgba(0,0,0,0.05)'">
                <div style="width:80px;height:80px;background:linear-gradient(135deg, #c16134 0%, #d3600f 100%);border-radius:50%;margin:0 auto 1.5rem;display:flex;align-items:center;justify-content:center">
                    <span style="color:white;font-size:2rem">🌟</span>
                </div>
                <h3 style="color:#2a4351;font-size:1.5rem;font-weight:700;margin:0 0 1rem 0"><?php echo esc_html($whatTitle); ?></h3>
                <p style="color:#666;font-size:1rem;line-height:1.6;margin:0"><?php echo esc_html($whatDescription); ?></p>
            </div>
        </div>
        
        <!-- Newsletter Section -->
        <div style="text-align:center;padding:3rem 2rem;background:linear-gradient(135deg, rgba(211,96,15,0.05) 0%, rgba(42,67,81,0.05) 100%);border-radius:2rem;border:1px solid rgba(211,96,15,0.1)">
            <h3 style="color:#2a4351;font-size:1.75rem;font-weight:700;margin:0 0 1rem 0"><?php echo esc_html($newsletterTitle); ?></h3>
            <p style="color:#666;font-size:1.1rem;margin:0 0 2rem 0;max-width:600px;margin-left:auto;margin-right:auto"><?php echo esc_html($newsletterDescription); ?></p>
            
            <form id="<?php echo esc_attr($formId); ?>" style="display:flex;gap:1rem;align-items:center;justify-content:center;flex-wrap:wrap;max-width:500px;margin:0 auto">
                <div style="flex:1;min-width:250px">
                    <input type="email" id="newsletterEmail" placeholder="<?php echo esc_attr($newsletterPlaceholder); ?>" required style="width:100%;padding:1rem 1.5rem;border:2px solid #e5d5c0;border-radius:3rem;font-size:1rem;transition:all 0.3s ease;box-sizing:border-box;background:#fafafa;outline:none" onfocus="this.style.borderColor='#d3600f';this.style.background='white';this.style.boxShadow='0 0 0 3px rgba(211,96,15,0.1)'" onblur="this.style.borderColor='#e5d5c0';this.style.background='#fafafa';this.style.boxShadow='none'">
                    <div id="newsletterError" style="color:#e53e3e;font-size:0.8rem;margin-top:0.5rem;text-align:left;display:none">Ingresa un email válido</div>
                </div>
                <button type="submit" style="background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;padding:1rem 2rem;border:none;border-radius:3rem;font-size:1rem;font-weight:600;cursor:pointer;transition:all 0.3s ease;text-transform:uppercase;letter-spacing:0.05em;white-space:nowrap" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 8px 20px rgba(211,96,15,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                    <?php echo esc_html($newsletterButton); ?>
                </button>
            </form>
            
            <div id="newsletterSuccess" style="margin-top:1rem;padding:1rem;background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:0.75rem;color:#16a34a;font-size:0.9rem;display:none;max-width:500px;margin-left:auto;margin-right:auto">
                ¡Gracias! Te has suscrito exitosamente a nuestro newsletter.
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('<?php echo esc_js($formId); ?>');
    const emailInput = document.getElementById('newsletterEmail');
    const errorDiv = document.getElementById('newsletterError');
    const successDiv = document.getElementById('newsletterSuccess');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const email = emailInput.value.trim();
            
            // Reset error
            errorDiv.style.display = 'none';
            successDiv.style.display = 'none';
            
            // Validate email
            if (!email || !email.includes('@')) {
                errorDiv.style.display = 'block';
                return;
            }
            
            // Simulate successful subscription
            form.style.display = 'none';
            successDiv.style.display = 'block';
            
            // Reset form after 3 seconds
            setTimeout(function() {
                form.style.display = 'flex';
                successDiv.style.display = 'none';
                emailInput.value = '';
            }, 3000);
        });
    }
});
</script>

