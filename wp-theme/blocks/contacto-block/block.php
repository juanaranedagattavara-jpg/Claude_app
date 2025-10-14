<?php
/**
 * Contacto Block Template
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

// Obtener atributos
$title = $attributes['title'] ?? 'Trabajemos Juntos';
$subtitle = $attributes['subtitle'] ?? '¿Listo para transformar tu territorio? Conectemos y exploremos cómo podemos impulsar el desarrollo regenerativo en tu región.';
$formFields = $attributes['formFields'] ?? [];
$buttonText = $attributes['buttonText'] ?? 'Enviar Mensaje';
$successMessage = $attributes['successMessage'] ?? '¡Gracias por tu mensaje! Te contactaremos pronto.';
$errorMessage = $attributes['errorMessage'] ?? 'Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo.';

// Generar ID único para el formulario
$formId = 'contactoForm_' . uniqid();
?>

<div class="wp-block-group section-optimized contacto-section" style="background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);box-shadow:0 -10px 30px rgba(0,0,0,0.1);scroll-margin-top:100px" id="contacto">
    <div style="max-width:800px;margin:0 auto;padding:0 1rem">
        <!-- Header -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em">Contacto</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(3rem, 6vw, 4.5rem);font-weight:700;color:white;margin:0 0 2rem 0;line-height:1.1;font-family:'Playfair Display',serif">
                <?php echo esc_html($title); ?>
            </h2>
            <p style="font-size:clamp(1.25rem, 3vw, 1.5rem);color:rgba(255,255,255,0.8);line-height:1.6;margin:0 auto;max-width:600px;font-weight:300">
                <?php echo esc_html($subtitle); ?>
            </p>
        </div>

        <!-- Formulario de contacto -->
        <div style="max-width:600px;margin:0 auto">
            <form id="<?php echo esc_attr($formId); ?>" style="background:rgba(255,255,255,0.15);backdrop-filter:blur(15px);border-radius:1.5rem;padding:3rem;border:1px solid rgba(255,255,255,0.3);box-shadow:0 20px 40px rgba(0,0,0,0.2)">
                <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:1.5rem;margin-bottom:2rem">
                    <?php foreach ($formFields as $field): ?>
                    <div>
                        <label style="display:block;color:white;font-weight:500;margin-bottom:0.5rem;font-size:0.875rem">
                            <?php echo esc_html($field['label']); ?>
                            <?php if ($field['required']): ?><span style="color:#d3600f">*</span><?php endif; ?>
                        </label>
                        <?php if ($field['type'] === 'textarea'): ?>
                        <textarea 
                            name="<?php echo esc_attr($field['name']); ?>" 
                            <?php echo $field['required'] ? 'required' : ''; ?>
                            rows="<?php echo esc_attr($field['rows'] ?? 5); ?>"
                            class="form-input" 
                            placeholder="<?php echo esc_attr($field['placeholder']); ?>"
                            style="width:100%;padding:1rem;border:2px solid rgba(255,255,255,0.2);border-radius:0.75rem;background:rgba(255,255,255,0.1);color:white;font-size:1rem;transition:all 0.3s ease;box-sizing:border-box;outline:none;resize:vertical"
                            onfocus="this.style.borderColor='#d3600f';this.style.background='rgba(255,255,255,0.2)'"
                            onblur="this.style.borderColor='rgba(255,255,255,0.2)';this.style.background='rgba(255,255,255,0.1)'"
                        ></textarea>
                        <?php else: ?>
                        <input 
                            type="<?php echo esc_attr($field['type']); ?>" 
                            name="<?php echo esc_attr($field['name']); ?>" 
                            <?php echo $field['required'] ? 'required' : ''; ?>
                            class="form-input" 
                            placeholder="<?php echo esc_attr($field['placeholder']); ?>"
                            style="width:100%;padding:1rem;border:2px solid rgba(255,255,255,0.2);border-radius:0.75rem;background:rgba(255,255,255,0.1);color:white;font-size:1rem;transition:all 0.3s ease;box-sizing:border-box;outline:none"
                            onfocus="this.style.borderColor='#d3600f';this.style.background='rgba(255,255,255,0.2)'"
                            onblur="this.style.borderColor='rgba(255,255,255,0.2)';this.style.background='rgba(255,255,255,0.1)'"
                        >
                        <?php endif; ?>
                        <div id="<?php echo esc_attr($field['name']); ?>Error" style="color:#ff6b6b;font-size:0.8rem;margin-top:0.5rem;display:none"></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                
                <button type="submit" class="btn-optimized" style="width:100%;padding:1.25rem 2rem;font-size:1.125rem;font-weight:700;text-transform:uppercase;letter-spacing:0.05em;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;border:none;border-radius:0.75rem;cursor:pointer;transition:all 0.3s ease;box-shadow:0 10px 25px -5px rgba(211,96,15,0.4)" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 15px 30px -5px rgba(211,96,15,0.6)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(211,96,15,0.4)'">
                    <?php echo esc_html($buttonText); ?>
                </button>
            </form>
            
            <!-- Mensajes de respuesta -->
            <div id="contactoSuccess" style="margin-top:2rem;padding:1.5rem;background:rgba(34,197,94,0.1);border:1px solid rgba(34,197,94,0.2);border-radius:0.75rem;color:#16a34a;font-size:1rem;display:none;text-align:center">
                <?php echo esc_html($successMessage); ?>
            </div>
            
            <div id="contactoError" style="margin-top:2rem;padding:1.5rem;background:rgba(239,68,68,0.1);border:1px solid rgba(239,68,68,0.2);border-radius:0.75rem;color:#dc2626;font-size:1rem;display:none;text-align:center">
                <?php echo esc_html($errorMessage); ?>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('<?php echo esc_js($formId); ?>');
    const successDiv = document.getElementById('contactoSuccess');
    const errorDiv = document.getElementById('contactoError');
    
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Reset messages
            successDiv.style.display = 'none';
            errorDiv.style.display = 'none';
            
            // Reset error messages
            const errorElements = form.querySelectorAll('[id$="Error"]');
            errorElements.forEach(el => {
                el.style.display = 'none';
                el.textContent = '';
            });
            
            // Validate form
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    const errorEl = document.getElementById(field.name + 'Error');
                    if (errorEl) {
                        errorEl.style.display = 'block';
                        errorEl.textContent = 'Este campo es requerido';
                    }
                    isValid = false;
                }
            });
            
            // Validate email
            const emailField = form.querySelector('input[type="email"]');
            if (emailField && emailField.value && !emailField.value.includes('@')) {
                const errorEl = document.getElementById(emailField.name + 'Error');
                if (errorEl) {
                    errorEl.style.display = 'block';
                    errorEl.textContent = 'Ingresa un email válido';
                }
                isValid = false;
            }
            
            if (isValid) {
                // Simulate form submission
                form.style.display = 'none';
                successDiv.style.display = 'block';
                
                // Reset form after 5 seconds
                setTimeout(function() {
                    form.style.display = 'block';
                    successDiv.style.display = 'none';
                    form.reset();
                }, 5000);
            } else {
                errorDiv.style.display = 'block';
            }
        });
    }
});
</script>

<style>
/* Form Input Styles */
.form-input::placeholder {
    color: rgba(255,255,255,0.6);
}

.form-input:focus::placeholder {
    color: rgba(255,255,255,0.8);
}

/* Responsive Design */
@media (max-width: 768px) {
    .contacto-section .wp-block-group {
        padding: 3rem 0;
    }
    
    .contacto-section form {
        padding: 2rem;
    }
}

@media (max-width: 480px) {
    .contacto-section form {
        padding: 1.5rem;
    }
    
    .contacto-section h2 {
        font-size: 2.5rem !important;
    }
    
    .contacto-section p {
        font-size: 1.1rem !important;
    }
}
</style>
