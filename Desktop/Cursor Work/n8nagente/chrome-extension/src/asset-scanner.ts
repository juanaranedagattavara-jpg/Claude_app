// Asset Scanner - Escanea y recopila URLs de activos en la página
import { AssetReference } from '@n8n/web-cloner-shared';

export class AssetScanner {
  private readonly ASSET_SELECTORS = {
    images: ['img', '[style*="background-image"]'],
    videos: ['video', 'iframe[src*="youtube"]', 'iframe[src*="vimeo"]'],
    fonts: ['link[rel="stylesheet"]', '@font-face'],
    css: ['link[rel="stylesheet"]', 'style'],
    js: ['script[src]']
  };

  scanAssets(): AssetReference[] {
    const assets: AssetReference[] = [];

    // Escanear imágenes
    assets.push(...this.scanImages());
    
    // Escanear videos e iframes
    assets.push(...this.scanVideos());
    
    // Escanear fuentes
    assets.push(...this.scanFonts());
    
    // Escanear CSS
    assets.push(...this.scanCSS());
    
    // Escanear JavaScript
    assets.push(...this.scanJavaScript());

    return this.deduplicateAssets(assets);
  }

  private scanImages(): AssetReference[] {
    const images: AssetReference[] = [];

    // Imágenes en etiquetas <img>
    const imgElements = document.querySelectorAll('img');
    imgElements.forEach((img, index) => {
      const src = img.src || img.getAttribute('data-src') || img.getAttribute('data-lazy-src');
      if (src && this.isValidUrl(src)) {
        images.push({
          type: 'image',
          url: this.resolveUrl(src),
          selector: `img:nth-child(${index + 1})`,
          alt: img.alt || '',
          title: img.title || ''
        });
      }
    });

    // Imágenes de fondo CSS
    const elementsWithBg = document.querySelectorAll('*');
    elementsWithBg.forEach((element, index) => {
      const computedStyle = window.getComputedStyle(element);
      const backgroundImage = computedStyle.backgroundImage;
      
      if (backgroundImage && backgroundImage !== 'none') {
        const urlMatch = backgroundImage.match(/url\(['"]?([^'"]+)['"]?\)/);
        if (urlMatch && this.isValidUrl(urlMatch[1])) {
          images.push({
            type: 'image',
            url: this.resolveUrl(urlMatch[1]),
            selector: this.getElementSelector(element),
            alt: '',
            title: ''
          });
        }
      }
    });

    return images;
  }

  private scanVideos(): AssetReference[] {
    const videos: AssetReference[] = [];

    // Videos HTML5
    const videoElements = document.querySelectorAll('video');
    videoElements.forEach((video, index) => {
      const src = video.src || video.getAttribute('data-src');
      if (src && this.isValidUrl(src)) {
        videos.push({
          type: 'video',
          url: this.resolveUrl(src),
          selector: `video:nth-child(${index + 1})`,
          alt: '',
          title: video.title || ''
        });
      }
    });

    // Iframes (YouTube, Vimeo, etc.)
    const iframeElements = document.querySelectorAll('iframe');
    iframeElements.forEach((iframe, index) => {
      const src = iframe.src;
      if (src && this.isValidUrl(src)) {
        videos.push({
          type: 'iframe',
          url: this.resolveUrl(src),
          selector: `iframe:nth-child(${index + 1})`,
          alt: '',
          title: iframe.title || ''
        });
      }
    });

    return videos;
  }

  private scanFonts(): AssetReference[] {
    const fonts: AssetReference[] = [];

    // Fuentes de Google Fonts y otros CDNs
    const linkElements = document.querySelectorAll('link[rel="stylesheet"]');
    linkElements.forEach((link, index) => {
      const href = link.getAttribute('href');
      if (href && this.isValidUrl(href) && this.isFontUrl(href)) {
        fonts.push({
          type: 'font',
          url: this.resolveUrl(href),
          selector: `link:nth-child(${index + 1})`,
          alt: '',
          title: ''
        });
      }
    });

    return fonts;
  }

  private scanCSS(): AssetReference[] {
    const cssFiles: AssetReference[] = [];

    // Hojas de estilo externas
    const linkElements = document.querySelectorAll('link[rel="stylesheet"]');
    linkElements.forEach((link, index) => {
      const href = link.getAttribute('href');
      if (href && this.isValidUrl(href) && !this.isFontUrl(href)) {
        cssFiles.push({
          type: 'css',
          url: this.resolveUrl(href),
          selector: `link:nth-child(${index + 1})`,
          alt: '',
          title: ''
        });
      }
    });

    return cssFiles;
  }

  private scanJavaScript(): AssetReference[] {
    const jsFiles: AssetReference[] = [];

    // Scripts externos
    const scriptElements = document.querySelectorAll('script[src]');
    scriptElements.forEach((script, index) => {
      const src = script.getAttribute('src');
      if (src && this.isValidUrl(src)) {
        jsFiles.push({
          type: 'js',
          url: this.resolveUrl(src),
          selector: `script:nth-child(${index + 1})`,
          alt: '',
          title: ''
        });
      }
    });

    return jsFiles;
  }

  private isValidUrl(url: string): boolean {
    try {
      new URL(url);
      return true;
    } catch {
      // Intentar con URL relativa
      try {
        new URL(url, window.location.href);
        return true;
      } catch {
        return false;
      }
    }
  }

  private resolveUrl(url: string): string {
    try {
      return new URL(url, window.location.href).href;
    } catch {
      return url;
    }
  }

  private isFontUrl(url: string): boolean {
    const fontPatterns = [
      'fonts.googleapis.com',
      'fonts.gstatic.com',
      'typekit.net',
      'use.typekit.net',
      'fontawesome.com',
      'cdnjs.cloudflare.com/ajax/libs/font-awesome'
    ];
    
    return fontPatterns.some(pattern => url.includes(pattern));
  }

  private getElementSelector(element: Element): string {
    if (element.id) {
      return `#${element.id}`;
    }
    
    if (element.className) {
      const classes = element.className.split(' ').filter(c => c.trim());
      if (classes.length > 0) {
        return `.${classes.join('.')}`;
      }
    }
    
    return element.tagName.toLowerCase();
  }

  private deduplicateAssets(assets: AssetReference[]): AssetReference[] {
    const seen = new Set<string>();
    return assets.filter(asset => {
      const key = `${asset.type}:${asset.url}`;
      if (seen.has(key)) {
        return false;
      }
      seen.add(key);
      return true;
    });
  }

  // Método para validar si un activo es accesible
  async validateAsset(asset: AssetReference): Promise<boolean> {
    try {
      const response = await fetch(asset.url, { 
        method: 'HEAD',
        mode: 'no-cors' // Para evitar problemas de CORS
      });
      return true;
    } catch (error) {
      console.warn(`Asset no accesible: ${asset.url}`, error);
      return false;
    }
  }

  // Método para obtener información adicional de un activo
  async getAssetInfo(asset: AssetReference): Promise<Partial<AssetReference>> {
    if (asset.type === 'image') {
      try {
        const img = new Image();
        img.src = asset.url;
        
        return new Promise((resolve) => {
          img.onload = () => {
            resolve({
              alt: `${asset.alt} (${img.width}x${img.height})`,
              title: asset.title || `${img.width}x${img.height}`
            });
          };
          img.onerror = () => {
            resolve({ alt: asset.alt + ' (error cargando)' });
          };
        });
      } catch (error) {
        return { alt: asset.alt + ' (error)' };
      }
    }
    
    return {};
  }
}
