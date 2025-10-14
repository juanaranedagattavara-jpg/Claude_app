<?php
/**
 * Template part para la sección Equipo
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Equipo y Directorio Section -->
<div class="wp-block-group section-optimized" style="background:linear-gradient(135deg, rgba(193,97,52,0.05) 0%, #ffffff 100%);position:relative;scroll-margin-top:100px" id="equipo">
    <!-- Contenido -->
    <div>
    <div class="container">
        <!-- Header -->
        <div style="text-align:center;margin-bottom:6rem">
            <div style="display:inline-block;margin-bottom:1.5rem">
                <span style="color:#d3600f;font-weight:600;font-size:0.875rem;text-transform:uppercase;letter-spacing:0.1em">Nuestro Equipo</span>
            </div>
            <h2 class="wp-block-heading" style="font-size:clamp(3rem, 6vw, 4.5rem);font-weight:700;color:#2a4351;margin:0 0 2rem 0;line-height:1.1;font-family:'Playfair Display',serif">
                Conoce a Nuestro Equipo
            </h2>
            <p style="font-size:clamp(1.25rem, 3vw, 1.5rem);color:#6b7280;line-height:1.6;margin:0 auto;max-width:800px;font-weight:300">
                Profesionales comprometidos con la <span style="color:#d3600f;font-weight:600">transformación social</span> y el desarrollo regenerativo en los Andes.
            </p>
        </div>

        <!-- Equipo Principal -->
        <div style="margin-bottom:4rem">
            <div style="text-align:center;margin-bottom:4rem">
                <h3 style="font-size:clamp(2rem, 4vw, 2.5rem);font-weight:700;color:#2a4351;margin:0 0 1rem 0;font-family:'Playfair Display',serif">
                    Equipo Ejecutivo
                </h3>
                <div style="width:6rem;height:0.25rem;background:#d3600f;margin:0 auto"></div>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:3rem">
                <style>
                    @media (min-width: 768px) {
                        .equipo-grid {
                            grid-template-columns: repeat(5, 1fr) !important;
                        }
                    }
                </style>
                
                <!-- Equipo Ejecutivo -->
                <div class="equipo-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:3rem">
                    <div style="text-align:center">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Pedro Smith</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Director Ejecutivo</p>
                    </div>

                    <div style="text-align:center">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Martín Araneda</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Director Desarrollo Territorial</p>
                    </div>

                    <div style="text-align:center">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #6b7280 0%, #4b5563 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Goran Ahumada</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Director Emprendimiento</p>
                    </div>

                    <div style="text-align:center">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Ana Rodríguez</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Directora de Programas</p>
                    </div>

                    <div style="text-align:center">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Carlos Mendoza</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Director de Comunicaciones</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Directorio -->
        <div style="margin-bottom:4rem">
            <div style="text-align:center;margin-bottom:4rem">
                <h3 style="font-size:clamp(2rem, 4vw, 2.5rem);font-weight:700;color:#2a4351;margin:0 0 1rem 0;font-family:'Playfair Display',serif">
                    Directorio
                </h3>
                <div style="width:6rem;height:0.25rem;background:#d3600f;margin:0 auto"></div>
            </div>
            
            <div style="display:grid;grid-template-columns:repeat(1,1fr);gap:3rem">
                <style>
                    @media (min-width: 768px) {
                        .directorio-grid {
                            grid-template-columns: repeat(4, 1fr) !important;
                        }
                    }
                </style>
                
                <!-- Director 1 -->
                <div class="directorio-grid" style="display:grid;grid-template-columns:repeat(1,1fr);gap:3rem">
                    <div style="text-align:center;background:white;border-radius:1rem;padding:2rem;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);border:1px solid #f3f4f6;transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)'">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #d3600f 0%, #c16134 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Dr. Roberto Silva</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Presidente</p>
                    </div>

                    <!-- Director 2 -->
                    <div style="text-align:center;background:white;border-radius:1rem;padding:2rem;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);border:1px solid #f3f4f6;transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)'">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #2a4351 0%, #1e3a47 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Dra. Carmen Mendoza</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Vicepresidenta</p>
                    </div>

                    <!-- Director 3 -->
                    <div style="text-align:center;background:white;border-radius:1rem;padding:2rem;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);border:1px solid #f3f4f6;transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)'">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #6b7280 0%, #4b5563 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Ing. Miguel Torres</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Tesorero</p>
                    </div>

                    <!-- Director 4 -->
                    <div style="text-align:center;background:white;border-radius:1rem;padding:2rem;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1);border:1px solid #f3f4f6;transition:all 0.3s ease" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 25px -5px rgba(0,0,0,0.1)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 10px 15px -3px rgba(0,0,0,0.1)'">
                        <div style="width:5rem;height:5rem;background:linear-gradient(135deg, #16a34a 0%, #15803d 100%);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1.5rem auto;box-shadow:0 10px 15px -3px rgba(0,0,0,0.1)">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor" style="color:white">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </div>
                        <h4 style="font-size:1.25rem;font-weight:700;color:#2a4351;margin:0 0 0.5rem 0">Lic. Patricia Vega</h4>
                        <p style="color:#d3600f;font-weight:600;font-size:0.875rem;margin:0">Secretaria</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
