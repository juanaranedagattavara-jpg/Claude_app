# Sueño Andino - WordPress Block Theme

Un tema WordPress Block Theme premium diseñado para organizaciones de desarrollo social que trabajan con comunidades andinas.

## 🚀 Características

### Diseño Premium
- **Tipografía elegante**: Playfair Display + Inter
- **Paleta de colores sofisticada**: Verdes profundos + dorado
- **Espaciado generoso**: Diseño world-class con mucho espacio
- **Responsive perfecto**: Optimizado para todos los dispositivos
- **Accesibilidad completa**: WCAG 2.1 AA compliant

### Estructura del Proyecto
- **3 páginas raíz**: Landing MVP, Arquitectura, Estándar de Calidad
- **7 secciones principales**: Hero, Golden Circle, Timeline, Servicios, Casos, Prensa, Contacto
- **Patterns reutilizables**: Componentes modulares para WordPress
- **Assets optimizados**: CSS, JS y recursos optimizados

### Rendimiento
- **CSS optimizado**: Variables CSS y arquitectura escalable
- **JavaScript minimalista**: Solo funcionalidades esenciales
- **Lazy loading**: Carga diferida de recursos
- **Preload crítico**: Recursos críticos precargados

## 📁 Estructura de Archivos

```
sueno-andino/
├── assets/
│   ├── css/
│   │   ├── base.css          # Estilos base
│   │   └── premium.css       # Estilos premium
│   ├── js/
│   │   └── main.js           # JavaScript principal
│   ├── img/                  # Imágenes optimizadas
│   └── media/                # Videos y media
├── templates/
│   ├── front-page.html       # Landing MVP
│   ├── page-arquitectura.html # Arquitectura del Proyecto
│   ├── page-estandar-calidad.html # Estándar de Calidad
│   └── page.html             # Página genérica
├── parts/
│   ├── header.html           # Header del sitio
│   └── footer.html           # Footer del sitio
├── patterns/
│   ├── hero.html             # Sección hero
│   ├── golden-circle.html    # Golden Circle
│   ├── timeline.html         # Timeline histórico
│   ├── servicios.html        # Servicios
│   ├── casos-exito.html      # Casos de éxito
│   ├── prensa-alianzas.html  # Prensa y alianzas
│   └── agenda-contacto.html  # Contacto
├── index-optimized.html      # Landing optimizada
├── index-premium.html        # Landing premium
├── style.css                 # Tema principal
├── theme.json                # Configuración del tema
├── functions.php             # Funcionalidades PHP
└── README.md                 # Este archivo
```

## 🎨 Versiones Disponibles

### 1. Landing Optimizada (`index-optimized.html`)
- **Accesibilidad completa**: ARIA labels, navegación por teclado
- **SEO optimizado**: Meta tags, Open Graph, JSON-LD
- **Rendimiento mejorado**: Preload, lazy loading
- **Estructura semántica**: HTML5 semántico

### 2. Landing Premium (`index-premium.html`)
- **Diseño world-class**: Espaciado generoso, tipografía premium
- **Efectos visuales**: Sombras, gradientes, hover effects
- **Sin emojis**: Diseño profesional y serio
- **Responsive perfecto**: Adaptación a todos los dispositivos

## 🛠️ Instalación

### Desarrollo Local
1. Clona el repositorio:
```bash
git clone https://github.com/juanaranedagattavara-jpg/sue-oandino.git
cd sue-oandino
```

2. Inicia servidor local:
```bash
python -m http.server 8000
```

3. Abre en navegador:
- Optimizada: `http://localhost:8000/index-optimized.html`
- Premium: `http://localhost:8000/index-premium.html`

### WordPress
1. Sube la carpeta del tema a `/wp-content/themes/`
2. Activa el tema desde el admin de WordPress
3. Configura las páginas según la arquitectura del proyecto

## 🎯 Secciones del Sitio

### 1. Hero
- Título impactante
- Video promocional
- CTAs principales
- Diseño full-screen

### 2. Golden Circle
- ¿Qué hacemos?
- ¿Cómo lo hacemos?
- ¿Por qué lo hacemos?

### 3. Timeline
- Historia de la organización
- Hitos importantes
- Evolución temporal

### 4. Servicios
- **Personas**: Educación y desarrollo personal
- **Empresas**: Responsabilidad social
- **Gobiernos**: Políticas públicas

### 5. Casos de Éxito
- Testimonios reales
- Métricas de impacto
- Historias de transformación

### 6. Prensa y Alianzas
- Medios de comunicación
- Aliados estratégicos
- Reconocimientos

### 7. Contacto
- Agenda de reuniones
- Descarga de dossier
- WhatsApp directo

## 🔧 Personalización

### Colores
Edita las variables CSS en `assets/css/premium.css`:
```css
:root {
    --primary-color: #1a472a;
    --secondary-color: #2d5a3d;
    --accent-color: #c9a96e;
    /* ... más variables */
}
```

### Tipografía
Cambia las fuentes en `theme.json`:
```json
{
    "typography": {
        "fontFamilies": [
            {
                "fontFamily": "Inter, sans-serif",
                "slug": "inter"
            }
        ]
    }
}
```

### Contenido
Modifica los patterns en la carpeta `patterns/` para cambiar el contenido de las secciones.

## 📱 Responsive Design

- **Desktop**: Layout completo con 3-4 columnas
- **Tablet**: 2 columnas adaptadas
- **Mobile**: 1 columna optimizada
- **Breakpoints**: 1024px, 768px, 480px

## ♿ Accesibilidad

- **WCAG 2.1 AA**: Cumple estándares de accesibilidad
- **Navegación por teclado**: Totalmente navegable sin mouse
- **Screen readers**: Compatible con lectores de pantalla
- **Contraste**: Mínimo 4.5:1 en todos los elementos
- **Focus management**: Indicadores de foco visibles

## 🚀 Rendimiento

- **LCP < 2.5s**: Largest Contentful Paint optimizado
- **FID < 100ms**: First Input Delay mínimo
- **CLS < 0.1**: Cumulative Layout Shift controlado
- **Lazy loading**: Carga diferida de recursos
- **Minificación**: CSS y JS optimizados

## 📊 SEO

- **Meta tags**: Títulos y descripciones optimizados
- **Open Graph**: Compartir en redes sociales
- **JSON-LD**: Datos estructurados
- **URLs limpias**: Estructura SEO-friendly
- **Sitemap**: Generación automática

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT. Ver `LICENSE` para más detalles.

## 📞 Contacto

- **Email**: info@sueñoandino.com
- **WhatsApp**: +51 999 888 777
- **Sitio Web**: https://sueñoandino.com

## 🙏 Agradecimientos

- Comunidades andinas por su inspiración
- Equipo de desarrollo por su dedicación
- Colaboradores y contribuidores

---

**Sueño Andino** - Transformando vidas en los Andes a través de la educación y el desarrollo sostenible.
