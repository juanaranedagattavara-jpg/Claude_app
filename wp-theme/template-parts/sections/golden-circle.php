<?php
/**
 * Template part para la sección Golden Circle
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Golden Circle Section - Diseño Minimalista Premium -->
<div class="wp-block-group golden-circle-optimized" id="nosotros">
    <!-- Elemento decorativo de fondo sutil -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:radial-gradient(circle at 20% 80%, rgba(211,96,15,0.02) 0%, transparent 50%), radial-gradient(circle at 80% 20%, rgba(42,67,81,0.02) 0%, transparent 50%);z-index:0"></div>
    
    <div class="container" style="position:relative;z-index:1">
        <!-- Header minimalista -->
        <div style="text-align:center;margin-bottom:4rem">
            <div style="display:inline-block;margin-bottom:1.5rem;padding:0.75rem 2rem;background:rgba(211,96,15,0.05);border-radius:3rem;border:1px solid rgba(211,96,15,0.1)">
                <span style="color:#d3600f;font-weight:500;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.15em">Nuestra Propuesta</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(2.5rem, 5vw, 3.5rem);font-weight:300;color:#2a4351;margin:0 0 2rem 0;line-height:1.1;font-family:'Playfair Display',serif;letter-spacing:-0.02em">
                ¿Por qué Sueño Andino?
            </h2>
            <p style="font-size:clamp(1.125rem, 2.5vw, 1.375rem);color:#6b7280;line-height:1.6;margin:0 auto;max-width:800px;font-weight:300;letter-spacing:-0.01em">
                Transformamos territorios combinando <span style="color:#d3600f;font-weight:500">sabiduría ancestral</span> con <span style="color:#d3600f;font-weight:500">innovación moderna</span>.
            </p>
        </div>
        
        <!-- Grid minimalista con placeholders de fotos -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:2.5rem;margin-bottom:4rem">
            <!-- Por qué lo hacemos -->
            <div style="position:relative;group">
                <div style="background:white;border-radius:1.5rem;padding:0;height:100%;transition:all 0.5s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(0,0,0,0.04);position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04)" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';this.style.borderColor='rgba(211,96,15,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.04)';this.style.borderColor='rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo minimalista -->
                    <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg, #d3600f 0%, #c16134 100%);border-radius:1.5rem 1.5rem 0 0;z-index:2"></div>
                    
                    <!-- Placeholder de foto - Ancho completo desde arriba -->
                    <div style="width:100%;height:180px;background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);border-radius:1.5rem 1.5rem 0 0;display:flex;align-items:center;justify-content:center;border:2px dashed #d1d5db;position:relative">
                        <div style="text-align:center;color:#9ca3af">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" style="margin-bottom:0.75rem">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <div style="font-size:0.875rem;font-weight:500">Foto placeholder</div>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="padding:2rem">
                        <h3 style="font-size:1.25rem;font-weight:600;color:#2a4351;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">¿Por qué lo hacemos?</h3>
                        <p style="color:#6b7280;line-height:1.5;margin:0;font-size:0.875rem;font-weight:400;letter-spacing:-0.005em">
                            Cada persona en los Andes merece oportunidades equitativas para <span style="color:#d3600f;font-weight:500">desarrollarse y prosperar</span>.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Cómo lo hacemos -->
            <div style="position:relative;group">
                <div style="background:white;border-radius:1.5rem;padding:0;height:100%;transition:all 0.5s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(0,0,0,0.04);position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04)" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';this.style.borderColor='rgba(211,96,15,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.04)';this.style.borderColor='rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo minimalista -->
                    <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg, #2a4351 0%, #1e3a47 100%);border-radius:1.5rem 1.5rem 0 0;z-index:2"></div>
                    
                    <!-- Placeholder de foto - Ancho completo desde arriba -->
                    <div style="width:100%;height:180px;background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);border-radius:1.5rem 1.5rem 0 0;display:flex;align-items:center;justify-content:center;border:2px dashed #d1d5db;position:relative">
                        <div style="text-align:center;color:#9ca3af">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" style="margin-bottom:0.75rem">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <div style="font-size:0.875rem;font-weight:500">Foto placeholder</div>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="padding:2rem">
                        <h3 style="font-size:1.25rem;font-weight:600;color:#2a4351;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">¿Cómo lo hacemos?</h3>
                        <p style="color:#6b7280;line-height:1.5;margin:0;font-size:0.875rem;font-weight:400;letter-spacing:-0.005em">
                            Trabajamos directamente con las comunidades usando un <span style="color:#2a4351;font-weight:500">enfoque participativo</span>.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Qué hacemos -->
            <div style="position:relative;group">
                <div style="background:white;border-radius:1.5rem;padding:0;height:100%;transition:all 0.5s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(0,0,0,0.04);position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04)" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';this.style.borderColor='rgba(211,96,15,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.04)';this.style.borderColor='rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo minimalista -->
                    <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg, #6b7280 0%, #4b5563 100%);border-radius:1.5rem 1.5rem 0 0;z-index:2"></div>
                    
                    <!-- Placeholder de foto - Ancho completo desde arriba -->
                    <div style="width:100%;height:180px;background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);border-radius:1.5rem 1.5rem 0 0;display:flex;align-items:center;justify-content:center;border:2px dashed #d1d5db;position:relative">
                        <div style="text-align:center;color:#9ca3af">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" style="margin-bottom:0.75rem">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <div style="font-size:0.875rem;font-weight:500">Foto placeholder</div>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="padding:2rem">
                        <h3 style="font-size:1.25rem;font-weight:600;color:#2a4351;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">¿Qué hacemos?</h3>
                        <p style="color:#6b7280;line-height:1.5;margin:0;font-size:0.875rem;font-weight:400;letter-spacing:-0.005em">
                            Desarrollamos programas educativos combinando <span style="color:#6b7280;font-weight:500">saberes ancestrales con metodologías modernas</span>.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Para quién -->
            <div style="position:relative;group">
                <div style="background:white;border-radius:1.5rem;padding:0;height:100%;transition:all 0.5s cubic-bezier(0.4, 0, 0.2, 1);border:1px solid rgba(0,0,0,0.04);position:relative;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,0.04)" onmouseover="this.style.transform='translateY(-12px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.08)';this.style.borderColor='rgba(211,96,15,0.15)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 20px rgba(0,0,0,0.04)';this.style.borderColor='rgba(0,0,0,0.04)'">
                    <!-- Elemento decorativo minimalista -->
                    <div style="position:absolute;top:0;left:0;width:100%;height:4px;background:linear-gradient(90deg, #16a34a 0%, #15803d 100%);border-radius:1.5rem 1.5rem 0 0;z-index:2"></div>
                    
                    <!-- Placeholder de foto - Ancho completo desde arriba -->
                    <div style="width:100%;height:180px;background:linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);border-radius:1.5rem 1.5rem 0 0;display:flex;align-items:center;justify-content:center;border:2px dashed #d1d5db;position:relative">
                        <div style="text-align:center;color:#9ca3af">
                            <svg width="48" height="48" viewBox="0 0 24 24" fill="currentColor" style="margin-bottom:0.75rem">
                                <path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z"/>
                            </svg>
                            <div style="font-size:0.875rem;font-weight:500">Foto placeholder</div>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div style="padding:2rem">
                        <h3 style="font-size:1.25rem;font-weight:600;color:#2a4351;margin:0 0 1rem 0;line-height:1.3;font-family:'Playfair Display',serif;letter-spacing:-0.01em">¿Para quién?</h3>
                        <p style="color:#6b7280;line-height:1.5;margin:0;font-size:0.875rem;font-weight:400;letter-spacing:-0.005em">
                            Trabajamos con <span style="color:#16a34a;font-weight:500">comunidades andinas, empresas y gobiernos</span> comprometidos.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Línea divisoria minimalista -->
        <div style="width:100%;height:1px;background:linear-gradient(90deg, transparent 0%, rgba(211,96,15,0.2) 50%, transparent 100%);margin:4rem 0"></div>
        
        <!-- Call to action minimalista -->
        <div style="text-align:center">
            <p style="font-size:1.25rem;color:#6b7280;margin:0 0 2rem 0;font-weight:300;letter-spacing:-0.01em">
                ¿Listo para ser parte de esta transformación?
            </p>
            <a href="#contacto" class="btn btn-primary" style="display:inline-block;padding:1rem 2.5rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;text-decoration:none;border-radius:3rem;font-weight:500;font-size:1rem;transition:all 0.4s cubic-bezier(0.4, 0, 0.2, 1);letter-spacing:0.01em;box-shadow:0 8px 25px rgba(211,96,15,0.2)" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 35px rgba(211,96,15,0.3)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 8px 25px rgba(211,96,15,0.2)'">
                Conectemos
            </a>
        </div>
    </div>
</div>
