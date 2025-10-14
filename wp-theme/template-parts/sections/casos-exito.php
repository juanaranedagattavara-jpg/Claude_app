<?php
/**
 * Template part para la sección Casos de Éxito
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Casos de Éxito Section -->
<div class="wp-block-group section-optimized" style="background:linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);background-image:url('<?php echo get_template_directory_uri(); ?>/assets/img/fondo-casosexito.jpg');background-size:cover;background-position:center;background-repeat:no-repeat;position:relative;scroll-margin-top:100px">
    <!-- Overlay para mejorar legibilidad -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(135deg, rgba(255,255,255,0.9) 0%, rgba(248,249,250,0.8) 100%);z-index:1"></div>
    <!-- Contenido -->
    <div style="position:relative;z-index:2">
    <div class="container">
        <!-- Header mejorado -->
        <div style="text-align:center;margin-bottom:5rem">
            <div style="display:inline-block;margin-bottom:1.5rem">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em">Nuestro Impacto</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(3rem, 6vw, 4.5rem);font-weight:700;color:#2a4351;margin:0 0 2rem 0;line-height:1.1;font-family:'Playfair Display',serif">
                Casos de Éxito
            </h2>
            <p style="font-size:clamp(1.25rem, 3vw, 1.5rem);color:#6b7280;line-height:1.6;margin:0;max-width:800px;margin-left:auto;margin-right:auto;font-weight:300">
                Historias reales de transformación que demuestran el impacto positivo de nuestro trabajo en las comunidades andinas.
            </p>
        </div>

        <!-- Testimonios mejorados -->
        <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:2rem;margin-bottom:5rem">
            <style>
                @media (min-width: 768px) {
                    .testimonios-grid {
                        grid-template-columns: repeat(3, 1fr) !important;
                    }
                }
            </style>
            
            <!-- Testimonio 1 -->
            <div class="testimonios-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:2rem;margin-bottom:5rem">
                <div style="position:relative">
                    <div style="background:white;border-radius:1.5rem;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);border:1px solid #f3f4f6;height:100%;transition:all 0.5s ease">
                        <div style="text-align:center;margin-bottom:1.5rem">
                            <div style="width:4rem;height:4rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;transition:transform 0.3s ease">
                                <span style="color:white;font-weight:700;font-size:1.25rem">+150%</span>
                            </div>
                            <h3 style="font-size:1.75rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Comunidad de Huancavelica</h3>
                            <p style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;margin:0">en ingresos familiares</p>
                        </div>
                        <blockquote style="color:#6b7280;line-height:1.6;margin:0 0 1.5rem 0;font-style:italic;text-align:center">
                            "Gracias al programa de emprendimiento, pudimos crear una cooperativa de artesanías que ahora exporta a nivel nacional."
                        </blockquote>
                        <div style="border-top:1px solid #f3f4f6;padding-top:1rem;text-align:center">
                            <div style="font-weight:600;color:#2a4351">María Quispe</div>
                            <div style="font-size:0.875rem;color:#6b7280">Líder Comunitaria</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div style="position:relative">
                    <div style="background:white;border-radius:1.5rem;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);border:1px solid #f3f4f6;height:100%;transition:all 0.5s ease">
                        <div style="text-align:center;margin-bottom:1.5rem">
                            <div style="width:4rem;height:4rem;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;transition:transform 0.3s ease">
                                <span style="color:white;font-weight:700;font-size:1.25rem">95%</span>
                            </div>
                            <h3 style="font-size:1.75rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Escuela Rural de Cusco</h3>
                            <p style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;margin:0">de aprobación estudiantil</p>
                        </div>
                        <blockquote style="color:#6b7280;line-height:1.6;margin:0 0 1.5rem 0;font-style:italic;text-align:center">
                            "Nuestros estudiantes ahora tienen acceso a tecnología educativa y metodologías modernas que los preparan para el futuro."
                        </blockquote>
                        <div style="border-top:1px solid #f3f4f6;padding-top:1rem;text-align:center">
                            <div style="font-weight:600;color:#2a4351">Prof. Carlos Mamani</div>
                            <div style="font-size:0.875rem;color:#6b7280">Director</div>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div style="position:relative">
                    <div style="background:white;border-radius:1.5rem;padding:2rem;box-shadow:0 25px 50px -12px rgba(0,0,0,0.25);border:1px solid #f3f4f6;height:100%;transition:all 0.5s ease">
                        <div style="text-align:center;margin-bottom:1.5rem">
                            <div style="width:4rem;height:4rem;background:linear-gradient(135deg, #6b7280 0%, #4b5563 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem auto;transition:transform 0.3s ease">
                                <span style="color:white;font-weight:700;font-size:1.25rem">+300</span>
                            </div>
                            <h3 style="font-size:1.75rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Empresa Minera Responsable</h3>
                            <p style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em;margin:0">empleos locales</p>
                        </div>
                        <blockquote style="color:#6b7280;line-height:1.6;margin:0 0 1.5rem 0;font-style:italic;text-align:center">
                            "El programa de responsabilidad social nos ayudó a crear un modelo de desarrollo sostenible que beneficia a toda la región."
                        </blockquote>
                        <div style="border-top:1px solid #f3f4f6;padding-top:1rem;text-align:center">
                            <div style="font-weight:600;color:#2a4351">Ing. Ana Vargas</div>
                            <div style="font-size:0.875rem;color:#6b7280">Gerente RSE</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logos de Aliados -->
        <div style="margin-bottom:5rem">
            <div style="text-align:center;margin-bottom:3rem">
                <h3 style="font-size:clamp(2rem, 4vw, 2.5rem);font-weight:700;color:#2a4351;margin:0 0 1rem 0;font-family:'Playfair Display',serif">
                    Nuestros Aliados
                </h3>
                <p style="font-size:1.125rem;color:#6b7280;max-width:600px;margin:0 auto">
                    Organizaciones que confían en nosotros para impulsar el desarrollo regenerativo
                </p>
            </div>
            
            <!-- Logos circulares estáticos -->
            <div style="background:white;border-radius:1.5rem;padding:3rem;border:1px solid #f3f4f6;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:2rem;justify-items:center">
                    <style>
                        @media (min-width: 768px) {
                            .logos-grid {
                                grid-template-columns: repeat(5, 1fr) !important;
                            }
                        }
                    </style>
                    
                    <!-- Logo 1 -->
                    <div class="logos-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:2rem;justify-items:center">
                        <div style="width:7rem;height:7rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <span style="color:white;font-weight:700;font-size:0.875rem;text-align:center">Gobierno<br>Regional</span>
                        </div>
                        
                        <!-- Logo 2 -->
                        <div style="width:7rem;height:7rem;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <span style="color:white;font-weight:700;font-size:0.875rem;text-align:center">Minera<br>XYZ</span>
                        </div>
                        
                        <!-- Logo 3 -->
                        <div style="width:7rem;height:7rem;background:linear-gradient(135deg, #6b7280 0%, #4b5563 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <span style="color:white;font-weight:700;font-size:0.875rem;text-align:center">Fundación<br>ABC</span>
                        </div>
                        
                        <!-- Logo 4 -->
                        <div style="width:7rem;height:7rem;background:linear-gradient(135deg, #16a34a 0%, #15803d 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <span style="color:white;font-weight:700;font-size:0.875rem;text-align:center">ONG<br>Def</span>
                        </div>
                        
                        <!-- Logo 5 -->
                        <div style="width:7rem;height:7rem;background:linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                            <span style="color:white;font-weight:700;font-size:0.875rem;text-align:center">Universidad<br>Nacional</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Galería de Fotos de la Marca -->
        <div style="background:linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);border-radius:1.5rem;padding:3rem;box-shadow:0 15px 35px rgba(0,0,0,0.1);border:1px solid rgba(211,96,15,0.15)">
            <div style="text-align:center;margin-bottom:3rem">
                <div style="display:inline-block;margin-bottom:1.5rem;background:rgba(201,169,110,0.1);padding:0.75rem 2rem;border-radius:2rem;border:1px solid rgba(201,169,110,0.2)">
                    <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em">Galería</span>
                </div>
                <h3 style="font-size:clamp(2rem, 4vw, 2.5rem);font-weight:700;margin:0 0 1rem 0;font-family:'Playfair Display',serif;color:#2a4351">
                    Nuestra Marca en Imágenes
                </h3>
                <p style="font-size:1.125rem;color:#6b7280;max-width:600px;margin:0 auto;line-height:1.6">
                    Momentos que capturan la esencia de nuestro trabajo regenerativo
                </p>
            </div>
            
            <!-- Grid de galería reorganizada: 2 grandes arriba, fila pequeña abajo -->
            <div style="display:flex;flex-direction:column;gap:1.5rem">
                <!-- Fila superior: 2 fotos grandes -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem">
                    <!-- Foto 1 - Grande -->
                    <div style="position:relative;overflow:hidden;border-radius:1rem;aspect-ratio:16/9;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 8px 25px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria1.jpg" 
                             alt="Comunidad andina trabajando en proyecto regenerativo" 
                             style="width:100%;height:100%;object-fit:cover;object-position:center;"
                             loading="lazy"
                             decoding="async">
                    </div>
                    
                    <!-- Foto 2 - Grande -->
                    <div style="position:relative;overflow:hidden;border-radius:1rem;aspect-ratio:16/9;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 8px 25px rgba(0,0,0,0.1);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria2.jpg" 
                             alt="Escuela rural en los Andes con estudiantes aprendiendo" 
                             style="width:100%;height:100%;object-fit:cover;object-position:center;"
                             loading="lazy"
                             decoding="async">
                    </div>
                </div>
                
                <!-- Carrusel de fotos pequeñas - 4 columnas fijas -->
                <div style="position:relative;overflow:hidden;border-radius:1rem;background:linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);box-shadow:0 10px 30px rgba(0,0,0,0.1);padding:1rem">
                    <!-- Grid de 4 columnas fijas -->
                    <div style="display:grid;grid-template-columns:repeat(4, 1fr);gap:1rem;min-height:250px">
                        <!-- Columna 1 -->
                        <div class="carrusel-columna" style="position:relative;overflow:hidden;border-radius:0.75rem;aspect-ratio:4/3;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(0,0,0,0.08);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                            <img id="foto-columna-1" src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria3.jpg" 
                                 alt="Taller de emprendimiento comunitario en los Andes" 
                                 style="width:100%;height:100%;object-fit:cover;object-position:center;transition:opacity 0.5s ease"
                                 loading="lazy"
                                 decoding="async">
                        </div>
                        
                        <!-- Columna 2 -->
                        <div class="carrusel-columna" style="position:relative;overflow:hidden;border-radius:0.75rem;aspect-ratio:4/3;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(0,0,0,0.08);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                            <img id="foto-columna-2" src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria4.jpg" 
                                 alt="Reunión comunitaria para planificación de proyectos" 
                                 style="width:100%;height:100%;object-fit:cover;object-position:center;transition:opacity 0.5s ease"
                                 loading="lazy"
                                 decoding="async">
                        </div>
                        
                        <!-- Columna 3 -->
                        <div class="carrusel-columna" style="position:relative;overflow:hidden;border-radius:0.75rem;aspect-ratio:4/3;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(0,0,0,0.08);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                            <img id="foto-columna-3" src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria5.jpg" 
                                 alt="Celebración de logros comunitarios en los Andes" 
                                 style="width:100%;height:100%;object-fit:cover;object-position:center;transition:opacity 0.5s ease"
                                 loading="lazy"
                                 decoding="async">
                        </div>
                        
                        <!-- Columna 4 -->
                        <div class="carrusel-columna" style="position:relative;overflow:hidden;border-radius:0.75rem;aspect-ratio:4/3;background:linear-gradient(135deg, #e5e7eb 0%, #f3f4f6 100%);display:flex;align-items:center;justify-content:center;box-shadow:0 6px 20px rgba(0,0,0,0.08);transition:transform 0.3s ease" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='translateY(0)'">
                            <img id="foto-columna-4" src="<?php echo get_template_directory_uri(); ?>/assets/img/galeria6.jpg" 
                                 alt="Paisaje andino con infraestructura comunitaria" 
                                 style="width:100%;height:100%;object-fit:cover;object-position:center;transition:opacity 0.5s ease"
                                 loading="lazy"
                                 decoding="async">
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <!-- Texto descriptivo -->
            <div style="text-align:center;margin-top:2rem;padding-top:2rem;border-top:1px solid rgba(201,169,110,0.2)">
                <p style="font-size:0.875rem;color:#6b7280;margin:0;font-style:italic">
                    Cada imagen cuenta una historia de transformación y esperanza
                </p>
            </div>
        </div>
    </div>
    </div>
</div>
