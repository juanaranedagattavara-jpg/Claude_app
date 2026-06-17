# Dashboard POCK - Docker image (nginx static)
FROM nginx:alpine

# Quitar config default
RUN rm /etc/nginx/conf.d/default.conf

# Copiar config y archivos
COPY nginx.conf /etc/nginx/conf.d/pock.conf
COPY index.html /usr/share/nginx/html/index.html

# Health check
HEALTHCHECK --interval=30s --timeout=5s --start-period=5s --retries=3 \
  CMD wget --quiet --tries=1 --spider http://localhost/health || exit 1

EXPOSE 80
