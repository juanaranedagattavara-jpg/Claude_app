# Script para generar iconos PNG desde SVG

## Opción 1: Usar herramientas online
1. Ve a https://convertio.co/svg-png/
2. Sube cada archivo SVG
3. Descarga como PNG con el tamaño correspondiente
4. Renombra los archivos:
   - icon16.png
   - icon32.png  
   - icon48.png
   - icon128.png

## Opción 2: Usar ImageMagick (si está instalado)
```bash
# Instalar ImageMagick primero
# Windows: choco install imagemagick
# macOS: brew install imagemagick
# Linux: sudo apt install imagemagick

magick icon16.svg icon16.png
magick icon32.svg icon32.png
magick icon48.svg icon48.png
magick icon128.svg icon128.png
```

## Opción 3: Usar Node.js con sharp
```bash
npm install sharp
node -e "
const sharp = require('sharp');
sharp('icon16.svg').png().resize(16,16).toFile('icon16.png');
sharp('icon32.svg').png().resize(32,32).toFile('icon32.png');
sharp('icon48.svg').png().resize(48,48).toFile('icon48.png');
sharp('icon128.svg').png().resize(128,128).toFile('icon128.png');
"
```

## Opción 4: Crear PNGs básicos con código
Por ahora, puedes usar los SVG directamente o crear PNGs simples con cualquier editor de imágenes.

## Diseño de los iconos
- Fondo azul (#2563eb) - Color de marca
- Documento blanco con sombra
- Círculo azul pequeño representando "clonación"
- Estilo moderno y minimalista
- Contraste alto para visibilidad en la barra de herramientas
