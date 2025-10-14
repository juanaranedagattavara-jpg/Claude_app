<?php
/**
 * Template part para la sección Timeline
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Timeline Section - Rediseño Minimalista -->
<div class="wp-block-group" style="position:relative;background-color:#ffffff;background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/timeline-background.jpg');background-size:cover;background-position:center;background-repeat:no-repeat;scroll-margin-top:100px;min-height:120vh;padding:8rem 0">
    <!-- Overlay 15% para 85% de nitidez -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:rgba(255,255,255,0.15);z-index:1"></div>
    
    <!-- Cuadro decorativo borroso con bordes circulares - Más compacto -->
    <div style="position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);width:85%;max-width:1000px;height:70vh;background:rgba(255,255,255,0.12);backdrop-filter:blur(15px);border-radius:2.5rem;border:1px solid rgba(255,255,255,0.2);z-index:1.5;box-shadow:0 25px 50px rgba(0,0,0,0.15);"></div>
    
    <div class="container" style="position:relative;z-index:2;display:flex;flex-direction:column;justify-content:center;min-height:100vh">
        <!-- Header compacto -->
        <div style="text-align:center;margin-bottom:2.5rem">
            <div style="display:inline-block;margin-bottom:1rem;background:rgba(201,169,110,0.1);padding:0.5rem 1.5rem;border-radius:2rem;border:1px solid rgba(201,169,110,0.2)">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Nuestra Historia</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(2.25rem, 4.5vw, 3rem);font-weight:700;color:#2a4351;margin:0 0 1rem 0;line-height:1.1;font-family:'Playfair Display',serif;text-shadow:0 2px 4px rgba(0,0,0,0.1);">
                Hitos Transformadores
            </h2>
            <p style="font-size:clamp(1rem, 2.2vw, 1.125rem);color:#374151;line-height:1.6;margin:0 auto;max-width:600px;font-weight:400;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                Seis años de <span style="color:#d3600f;font-weight:600;text-shadow:0 1px 2px rgba(0,0,0,0.1);">impacto regenerativo</span> en las comunidades andinas.
            </p>
        </div>
        
        <!-- Timeline vertical compacta -->
        <div style="max-width:750px;margin:0 auto;position:relative">
            <!-- Línea vertical central -->
            <div style="position:absolute;left:1.75rem;top:0;bottom:0;width:2px;background:linear-gradient(to bottom, #d3600f 0%, #d3600f 70%, rgba(211,96,15,0.3) 100%);z-index:1"></div>
            
            <!-- Timeline items compactos -->
            <div style="display:grid;gap:1.5rem">
                <!-- 2018 - Fundación -->
                <div style="display:flex;align-items:flex-start;gap:1.5rem;position:relative;z-index:2">
                    <!-- Año -->
                    <div style="flex-shrink:0;width:3.5rem;text-align:center">
                        <div style="width:2.5rem;height:2.5rem;background-color:#d3600f;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;box-shadow:0 3px 6px -1px rgba(0,0,0,0.1);margin:0 auto">
                            18
                        </div>
                        <div style="margin-top:0.25rem;font-size:0.7rem;color:#d3600f;font-weight:600">2018</div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="flex:1;padding-top:0.25rem">
                        <h3 style="font-size:1.125rem;font-weight:700;color:#2a4351;margin:0 0 0.25rem 0;line-height:1.3;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Fundación</h3>
                        <p style="color:#374151;line-height:1.4;margin:0;font-size:0.875rem;font-weight:500;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                            Nace Sueño Andino con la misión de transformar vidas en las comunidades andinas.
                        </p>
                    </div>
                </div>
                
                <!-- 2020 - Primeros Proyectos -->
                <div style="display:flex;align-items:flex-start;gap:1.5rem;position:relative;z-index:2">
                    <!-- Año -->
                    <div style="flex-shrink:0;width:3.5rem;text-align:center">
                        <div style="width:2.5rem;height:2.5rem;background-color:#d3600f;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;box-shadow:0 3px 6px -1px rgba(0,0,0,0.1);margin:0 auto">
                            20
                        </div>
                        <div style="margin-top:0.25rem;font-size:0.7rem;color:#d3600f;font-weight:600">2020</div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="flex:1;padding-top:0.25rem">
                        <h3 style="font-size:1.125rem;font-weight:700;color:#2a4351;margin:0 0 0.25rem 0;line-height:1.3;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Primeros Proyectos</h3>
                        <p style="color:#374151;line-height:1.4;margin:0;font-size:0.875rem;font-weight:500;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                            Implementamos programas educativos en 5 comunidades, beneficiando a 200+ familias.
                        </p>
                    </div>
                </div>
                
                <!-- 2022 - Expansión -->
                <div style="display:flex;align-items:flex-start;gap:1.5rem;position:relative;z-index:2">
                    <!-- Año -->
                    <div style="flex-shrink:0;width:3.5rem;text-align:center">
                        <div style="width:2.5rem;height:2.5rem;background-color:#d3600f;border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;box-shadow:0 3px 6px -1px rgba(0,0,0,0.1);margin:0 auto">
                            22
                        </div>
                        <div style="margin-top:0.25rem;font-size:0.7rem;color:#d3600f;font-weight:600">2022</div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="flex:1;padding-top:0.25rem">
                        <h3 style="font-size:1.125rem;font-weight:700;color:#2a4351;margin:0 0 0.25rem 0;line-height:1.3;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Expansión</h3>
                        <p style="color:#374151;line-height:1.4;margin:0;font-size:0.875rem;font-weight:500;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                            Ampliamos servicios a empresas y gobiernos, estableciendo alianzas estratégicas.
                        </p>
                    </div>
                </div>
                
                <!-- 2024 - Presente -->
                <div style="display:flex;align-items:flex-start;gap:1.5rem;position:relative;z-index:2">
                    <!-- Año -->
                    <div style="flex-shrink:0;width:3.5rem;text-align:center">
                        <div style="width:2.5rem;height:2.5rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;color:white;font-weight:700;font-size:0.75rem;box-shadow:0 3px 6px -1px rgba(0,0,0,0.1);margin:0 auto">
                            24
                        </div>
                        <div style="margin-top:0.25rem;font-size:0.7rem;color:#d3600f;font-weight:600">2024</div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="flex:1;padding-top:0.25rem">
                        <h3 style="font-size:1.125rem;font-weight:700;color:#2a4351;margin:0 0 0.25rem 0;line-height:1.3;text-shadow:0 1px 2px rgba(0,0,0,0.1);">Presente</h3>
                        <p style="color:#374151;line-height:1.4;margin:0;font-size:0.875rem;font-weight:500;text-shadow:0 1px 2px rgba(0,0,0,0.05);">
                            Hemos transformado 1,200+ vidas y continuamos creciendo con metodologías innovadoras.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
