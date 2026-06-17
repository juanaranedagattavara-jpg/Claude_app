#!/bin/bash
# Deploy POCK Panel - script automatico para VPS Hostinger
# Uso: bash deploy.sh

set -e

echo "=========================================="
echo "  POCK PANEL - Deploy Automatico"
echo "=========================================="
echo ""

# Variables (ajusta si tu setup es distinto)
APP_DIR="/opt/pock-dashboard"
PORT="8080"

# 1. Crear directorio
echo "[1/5] Preparando directorio en $APP_DIR..."
sudo mkdir -p $APP_DIR
sudo chown -R $USER:$USER $APP_DIR

# 2. Mover archivos al directorio
echo "[2/5] Copiando archivos..."
cp -f index.html Dockerfile nginx.conf docker-compose.yml $APP_DIR/

cd $APP_DIR

# 3. Build + run
echo "[3/5] Construyendo contenedor Docker..."
docker compose down 2>/dev/null || true
docker compose up -d --build

# 4. Verificar
echo "[4/5] Verificando salud..."
sleep 3
if curl -sf http://localhost:$PORT/health > /dev/null; then
  echo "    OK - Contenedor respondiendo en puerto $PORT"
else
  echo "    ERROR - Contenedor no responde. Revisa: docker logs pock-dashboard"
  exit 1
fi

# 5. Resumen
echo "[5/5] Listo!"
echo ""
echo "=========================================="
echo "  Deploy completado"
echo "=========================================="
echo ""
echo "Panel corriendo en: http://localhost:$PORT"
echo ""
echo "PROXIMOS PASOS:"
echo "1. Conectar tu reverse proxy (Caddy/Nginx/Traefik) a localhost:$PORT"
echo "2. Apuntar DNS panel.aranedaoffice.cloud al VPS"
echo "3. Verificar https://panel.aranedaoffice.cloud abre el panel"
echo ""
echo "Logs en vivo: docker logs pock-dashboard -f"
echo "Reiniciar: cd $APP_DIR && docker compose restart"
