<?php
/**
 * Template part para la sección Hero
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Hero Section -->
<div id="hero" class="wp-block-group hero-optimized">
    <!-- Imagen de fondo -->
    <div style="position:absolute;top:0;left:0;right:0;bottom:0;z-index:0">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-background.jpg" 
             alt="Paisaje andino regenerativo con montañas y comunidades" 
             style="width:100%;height:100%;object-fit:cover;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);"
             loading="eager"
             decoding="async">
        <!-- Overlay mejorado para legibilidad del texto -->
        <div style="position:absolute;top:0;left:0;right:0;bottom:0;background:linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0.5) 100%)"></div>
    </div>
    
    <!-- Contenido centrado premium -->
    <div style="position:relative;z-index:10;text-align:center;color:white;max-width:900px;margin:0 auto;padding:0 2rem;display:flex;flex-direction:column;justify-content:center;align-items:center;min-height:100vh">
        <h1 class="wp-block-heading" style="font-size:clamp(2.5rem, 6vw, 4rem);font-weight:800;margin:0 0 3rem 0;line-height:1.1;font-family:'Playfair Display',serif;text-shadow:0 6px 12px rgba(0,0,0,0.6), 0 2px 4px rgba(0,0,0,0.4);color:white;letter-spacing:-0.02em">
            <div style="white-space:nowrap;display:inline-block">
                <div style="display:block;color:white;text-shadow:0 6px 12px rgba(0,0,0,0.6), 0 2px 4px rgba(0,0,0,0.4);white-space:nowrap;margin-bottom:0.5rem">DESARROLLO TERRITORIAL REGENERATIVO</div>
                <div style="display:block;color:#d3600f;text-shadow:0 6px 12px rgba(0,0,0,0.6), 0 2px 4px rgba(0,0,0,0.4);white-space:nowrap">DESDE Y HACIA LATINOAMÉRICA</div>
            </div>
        </h1>
        
        <p style="font-size:clamp(1.5rem, 4vw, 2.25rem);font-weight:300;line-height:1.4;margin:0 0 4rem 0;max-width:1800px;margin-left:auto;margin-right:auto;text-shadow:0 2px 4px rgba(0,0,0,0.3);white-space:nowrap">
            Impulsamos proyectos de desarrollo territorial que devuelven vitalidad a los ecosistemas, fortalecen comunidades y generan prosperidad consciente y regenerativa
        </p>
        
        <!-- Botón CTA más pequeño -->
        <div style="display:flex;justify-content:center;margin-bottom:4rem">
            <a href="#servicios" class="btn btn-primary" style="background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);color:white;padding:1rem 2.5rem;border-radius:0.75rem;text-decoration:none;font-weight:700;font-size:1rem;transition:all 0.4s ease;box-shadow:0 10px 25px -5px rgba(211,96,15,0.4);text-transform:uppercase;letter-spacing:0.05em" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 15px 30px -5px rgba(211,96,15,0.6)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 25px -5px rgba(211,96,15,0.4)'">
                Conoce Nuestros Servicios
            </a>
        </div>
        
        <!-- Indicador de scroll premium -->
        <div style="position:absolute;bottom:8rem;left:50%;transform:translateX(-50%);animation:bounce 2s infinite">
            <div style="width:2px;height:3rem;background:linear-gradient(to bottom, #d3600f 0%, transparent 100%);border-radius:1px"></div>
        </div>
    </div>
    
    <!-- Franja de Impacto en Números - Parte más baja del Hero -->
    <div style="position:absolute;bottom:0;left:0;right:0;width:100vw;background:#2a4351;backdrop-filter:blur(10px);border-top:1px solid rgba(211,96,15,0.3);padding:1rem 0;z-index:5">
        <div style="width:100%;padding:0 1rem">
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;text-align:center">
                <div>
                    <div style="font-size:2rem;font-weight:800;color:#d3600f;line-height:1;margin-bottom:0.25rem;font-family:'Playfair Display',serif">1,200+</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.1em;font-weight:500">Personas Beneficiadas</div>
                </div>
                <div>
                    <div style="font-size:2rem;font-weight:800;color:#d3600f;line-height:1;margin-bottom:0.25rem;font-family:'Playfair Display',serif">25+</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.1em;font-weight:500">Comunidades Atendidas</div>
                </div>
                <div>
                    <div style="font-size:2rem;font-weight:800;color:#d3600f;line-height:1;margin-bottom:0.25rem;font-family:'Playfair Display',serif">15+</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.1em;font-weight:500">Proyectos Exitosos</div>
                </div>
                <div>
                    <div style="font-size:2rem;font-weight:800;color:#d3600f;line-height:1;margin-bottom:0.25rem;font-family:'Playfair Display',serif">98%</div>
                    <div style="font-size:0.75rem;color:rgba(255,255,255,0.8);text-transform:uppercase;letter-spacing:0.1em;font-weight:500">Satisfacción</div>
                </div>
            </div>
        </div>
    </div>
</div>
