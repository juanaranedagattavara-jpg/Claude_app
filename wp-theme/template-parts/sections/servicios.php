<?php
/**
 * Template part para la sección Servicios
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Servicios Section - World Class Design -->
<div class="wp-block-group section-optimized" style="background-color:#ffffff;scroll-margin-top:100px" id="servicios">
    <div class="container">
        <!-- Header elegante -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem;background:rgba(211,96,15,0.08);padding:0.625rem 1.75rem;border-radius:2.5rem;border:1px solid rgba(211,96,15,0.15)">
                <span style="color:#d3600f;font-weight:600;font-size:0.8rem;text-transform:uppercase;letter-spacing:0.12em">Nuestros Servicios</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(2.75rem, 5.5vw, 3.75rem);font-weight:400;color:#2a4351;margin:0 0 1.75rem 0;line-height:1.15;font-family:'Playfair Display',serif;letter-spacing:-0.015em">
                Soluciones Especializadas
            </h2>
            <p style="font-size:clamp(1.125rem, 2.5vw, 1.375rem);color:#6b6b6b;line-height:1.6;margin:0;max-width:800px;margin-left:auto;margin-right:auto;font-weight:300">
                Desarrollamos programas integrales que combinan metodologías probadas con innovación constante para cada tipo de organización.
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
            
            <!-- Servicio 1: Personas -->
            <div style="position:relative;group">
                <div style="background:#2a4351;border-radius:2rem;padding:3rem 2.5rem;height:100%;box-shadow:0 0 0 1px rgba(0,0,0,0.04);transition:all 0.6s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(42,67,81,0.2);position:relative;overflow:hidden" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 40px 80px -12px rgba(0,0,0,0.15), 0 0 0 1px rgba(211,96,15,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 0 0 1px rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo sutil -->
                    <div style="position:absolute;top:-2rem;right:-2rem;width:8rem;height:8rem;background:linear-gradient(135deg, rgba(211,96,15,0.03) 0%, transparent 60%);border-radius:50%;z-index:0"></div>
                    
                    <!-- Icono minimalista -->
                    <div style="width:3.5rem;height:3.5rem;background:rgba(211,96,15,0.08);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;position:relative;z-index:1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="color:#d3600f">
                            <path d="M16 4c0-1.11.89-2 2-2s2 .89 2 2-.89 2-2 2-2-.89-2-2zm4 18v-6h2.5l-2.54-7.63A1.5 1.5 0 0 0 18.54 7H16c-.8 0-1.54.37-2.01.99L12 10l-1.99-2.01A2.5 2.5 0 0 0 8 7H5.46c-.8 0-1.54.37-2.01.99L1 10.5V22h2v-6h2.5l2.54 7.63A1.5 1.5 0 0 0 9.46 25H12c.8 0 1.54-.37 2.01-.99L16 22l1.99 2.01A2.5 2.5 0 0 0 20 25h2.54c.8 0 1.54-.37 2.01-.99L27 16.5V22h2z"/>
                        </svg>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="position:relative;z-index:1">
                        <h3 style="font-size:1.5rem;font-weight:600;color:white;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">
                            Para Personas
                        </h3>
                        <p style="color:rgba(255,255,255,0.9);line-height:1.6;margin:0 0 1.5rem 0;font-size:0.95rem;font-weight:400">
                            Programas de educación básica y técnica, capacitación en emprendimiento, desarrollo de habilidades digitales y apoyo psicosocial para empoderar a las comunidades andinas.
                        </p>
                        
                        <!-- Línea decorativa -->
                        <div style="width:3rem;height:2px;background:linear-gradient(90deg, #d3600f 0%, rgba(211,96,15,0.3) 100%);border-radius:1px"></div>
                    </div>
                </div>
            </div>
            
            <!-- Servicio 2: Empresas -->
            <div style="position:relative;group">
                <div style="background:#2a4351;border-radius:2rem;padding:3rem 2.5rem;height:100%;box-shadow:0 0 0 1px rgba(0,0,0,0.04);transition:all 0.6s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(42,67,81,0.2);position:relative;overflow:hidden" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 40px 80px -12px rgba(0,0,0,0.15), 0 0 0 1px rgba(211,96,15,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 0 0 1px rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo sutil -->
                    <div style="position:absolute;top:-2rem;right:-2rem;width:8rem;height:8rem;background:linear-gradient(135deg, rgba(211,96,15,0.03) 0%, transparent 60%);border-radius:50%;z-index:0"></div>
                    
                    <!-- Icono minimalista -->
                    <div style="width:3.5rem;height:3.5rem;background:rgba(211,96,15,0.08);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;position:relative;z-index:1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="color:#d3600f">
                            <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10z"/>
                        </svg>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="position:relative;z-index:1">
                        <h3 style="font-size:1.5rem;font-weight:600;color:white;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">
                            Para Empresas
                        </h3>
                        <p style="color:rgba(255,255,255,0.9);line-height:1.6;margin:0 0 1.5rem 0;font-size:0.95rem;font-weight:400">
                            Consultoría en responsabilidad social, programas de desarrollo comunitario, capacitación de personal local y proyectos de impacto social para empresas comprometidas.
                        </p>
                        
                        <!-- Línea decorativa -->
                        <div style="width:3rem;height:2px;background:linear-gradient(90deg, #d3600f 0%, rgba(211,96,15,0.3) 100%);border-radius:1px"></div>
                    </div>
                </div>
            </div>
            
            <!-- Servicio 3: Gobiernos -->
            <div style="position:relative;group">
                <div style="background:#2a4351;border-radius:2rem;padding:3rem 2.5rem;height:100%;box-shadow:0 0 0 1px rgba(0,0,0,0.04);transition:all 0.6s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(42,67,81,0.2);position:relative;overflow:hidden" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 40px 80px -12px rgba(0,0,0,0.15), 0 0 0 1px rgba(211,96,15,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 0 0 1px rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo sutil -->
                    <div style="position:absolute;top:-2rem;right:-2rem;width:8rem;height:8rem;background:linear-gradient(135deg, rgba(211,96,15,0.03) 0%, transparent 60%);border-radius:50%;z-index:0"></div>
                    
                    <!-- Icono minimalista -->
                    <div style="width:3.5rem;height:3.5rem;background:rgba(211,96,15,0.08);border-radius:1.25rem;display:flex;align-items:center;justify-content:center;margin-bottom:2rem;position:relative;z-index:1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" style="color:#d3600f">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="position:relative;z-index:1">
                        <h3 style="font-size:1.5rem;font-weight:600;color:white;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">
                            Para Gobiernos
                        </h3>
                        <p style="color:rgba(255,255,255,0.9);line-height:1.6;margin:0 0 1.5rem 0;font-size:0.95rem;font-weight:400">
                            Políticas públicas de desarrollo, programas de inclusión social, capacitación de funcionarios y evaluación de impacto social para gobiernos locales y nacionales.
                        </p>
                        
                        <!-- Línea decorativa -->
                        <div style="width:3rem;height:2px;background:linear-gradient(90deg, #d3600f 0%, rgba(211,96,15,0.3) 100%);border-radius:1px"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Call to Action minimalista -->
        <div style="text-align:center">
            <div style="background:linear-gradient(135deg, #c16134 0%, #d3600f 100%);border-radius:1.25rem;padding:2rem 1.75rem;border:1px solid rgba(193,97,52,0.15);max-width:600px;margin:0 auto;position:relative;overflow:hidden;box-shadow:0 10px 25px -5px rgba(193,97,52,0.2)">
                <!-- Elemento decorativo de fondo -->
                <div style="position:absolute;top:-50%;left:-50%;width:200%;height:200%;background:radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);z-index:0"></div>
                
                <div style="position:relative;z-index:1">
                    <h3 style="font-size:clamp(1.5rem, 2.5vw, 1.875rem);font-weight:400;color:white;margin:0 0 1rem 0;font-family:'Playfair Display',serif;letter-spacing:-0.01em">
                        ¿Listo para transformar tu organización?
                    </h3>
                    <p style="font-size:0.9rem;color:rgba(255,255,255,0.85);margin:0 0 1.5rem 0;line-height:1.5;font-weight:300">
                        Descubre cómo nuestros servicios pueden impulsar el desarrollo regenerativo en tu comunidad o empresa.
                    </p>
                    <button onclick="abrirModalCalendario()" style="display:inline-block;padding:0.75rem 1.5rem;background-color:white;color:#d3600f;border:none;border-radius:0.5rem;text-decoration:none;font-weight:500;font-size:0.85rem;transition:all 0.3s cubic-bezier(0.4, 0, 0.2, 1);letter-spacing:0.01em;cursor:pointer;" onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 8px 20px -4px rgba(255,255,255,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='none'">
                        Agendar Consulta
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
