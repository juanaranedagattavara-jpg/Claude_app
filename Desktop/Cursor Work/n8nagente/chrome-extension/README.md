# N8N Web Cloner - Extensión Chrome

Extensión Chrome Manifest V3 para capturar páginas web con alta fidelidad visual y convertirlas automáticamente en plantillas de WordPress (Elementor/Gutenberg).

## 🚀 Características

- ✅ **Captura de DOM estabilizada** con MutationObserver
- ✅ **Extracción de estilos computados** para máxima fidelidad visual
- ✅ **Escaneo de activos** (imágenes, videos, fuentes, CSS)
- ✅ **UI moderna** con interfaz intuitiva
- ✅ **Logging detallado** para debugging
- ✅ **Gestión de errores** robusta

## 📦 Instalación

### 1. Compilar la extensión

```bash
cd chrome-extension
npm install
npm run build
```

Esto generará la carpeta `dist/` con la extensión compilada.

### 2. Cargar en Chrome

1. Abre Chrome y navega a `chrome://extensions/`
2. Activa el "Modo de desarrollador" (esquina superior derecha)
3. Haz clic en "Cargar extensión sin empaquetar"
4. Selecciona la carpeta `chrome-extension/dist/`
5. La extensión aparecerá en tu barra de herramientas

## ⚙️ Configuración

Al abrir la extensión por primera vez:

1. **URL del Backend**: `http://localhost:3000` (o donde esté ejecutándose tu backend)
2. **URL de WordPress**: La URL de tu sitio WordPress
3. **Usuario de WordPress**: Tu nombre de usuario
4. **Contraseña de Aplicación**: Genera una en `WordPress Admin > Usuarios > Tu Perfil > Contraseñas de Aplicación`

Haz clic en "Guardar" para almacenar la configuración.

## 🎯 Uso

1. Navega a la página web que deseas clonar
2. Haz clic en el icono de la extensión N8N Web Cloner
3. Verifica que la información de la página sea correcta
4. Haz clic en "Clonar Página"
5. Espera a que el proceso complete (se mostrarán mensajes de progreso)
6. Recibirás un enlace a la página creada en WordPress

## 🛠️ Desarrollo

### Scripts disponibles

```bash
# Compilar para producción
npm run build

# Compilar en modo desarrollo con watch
npm run dev

# Limpiar archivos compilados
npm run clean
```

### Estructura de archivos

```
chrome-extension/
├── src/
│   ├── manifest.json          # Configuración de la extensión
│   ├── popup.html             # UI del popup
│   ├── popup.ts               # Lógica del popup
│   ├── content-script.ts      # Script inyectado en páginas
│   ├── service-worker.ts      # Worker de fondo
│   ├── dom-stabilizer.ts      # Espera estabilidad del DOM
│   ├── style-extractor.ts     # Extrae estilos computados
│   ├── asset-scanner.ts       # Escanea activos
│   └── icons/                 # Iconos de la extensión
├── dist/                      # Extensión compilada (generada)
├── package.json
├── tsconfig.json
└── webpack.config.js
```

## 📝 Notas Técnicas

### Captura del DOM

La extensión espera a que el DOM se estabilice antes de capturar:
- Detecta cuando no hay mutaciones por 300ms
- Espera a que las imágenes críticas se carguen
- Espera a que las fuentes se carguen
- Timeout máximo de 8 segundos

### Extracción de Estilos

Se extraen solo las propiedades CSS más relevantes para mantener el rendimiento:
- Layout: width, height, margin, padding, position
- Tipografía: font-family, font-size, color, line-height
- Visual: background, border, box-shadow, opacity
- Flexbox/Grid: display, flex-*, grid-*

### Activos

Los activos se referencian por URL externa (no se descargan):
- Imágenes (img tags y background-image)
- Videos (video tags e iframes)
- Fuentes (Google Fonts, TypeKit, etc.)
- CSS externo
- JavaScript externo

## 🐛 Troubleshooting

### La extensión no se carga

- Verifica que hayas compilado con `npm run build`
- Asegúrate de cargar la carpeta `dist/`, no la carpeta `src/`
- Revisa la consola de Chrome Extensions para errores

### La captura falla

- Verifica que el backend esté ejecutándose
- Revisa la configuración de la extensión
- Abre la consola del navegador para ver logs detallados
- Espera a que la página esté completamente cargada

### Error de CORS

- Asegúrate de que el backend tenga CORS habilitado
- Verifica que la URL del backend sea correcta

## 📄 Licencia

Uso interno - N8N Web Cloner MVP

## 🔗 Enlaces

- Backend: `../backend/`
- WordPress Plugin: `../wordpress-plugin/`
- Documentación: `../docs/`
