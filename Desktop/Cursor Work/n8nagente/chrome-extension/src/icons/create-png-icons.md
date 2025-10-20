# Crear iconos PNG básicos para la extensión Chrome

## Método rápido: Usar herramientas online

1. Ve a https://convertio.co/svg-png/
2. Sube cada archivo SVG:
   - icon16.svg → icon16.png (16x16px)
   - icon32.svg → icon32.png (32x32px)
   - icon48.svg → icon48.png (48x48px)
   - icon128.svg → icon128.png (128x128px)
3. Descarga y coloca en esta carpeta

## Método alternativo: Usar Node.js

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

## Método con ImageMagick

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

## Nota importante
La extensión funcionará con los archivos SVG, pero Chrome prefiere PNG para mejor compatibilidad y rendimiento.