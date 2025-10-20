// Content Script - Se ejecuta en cada página web
import { DOMStabilizer } from './dom-stabilizer';
import { StyleExtractor } from './style-extractor';
import { AssetScanner } from './asset-scanner';
import { ExtractionData, ComputedStyleMap, AssetReference, PageMetadata } from '@n8n/web-cloner-shared';

class WebClonerContentScript {
  private stabilizer: DOMStabilizer;
  private styleExtractor: StyleExtractor;
  private assetScanner: AssetScanner;
  private isCapturing: boolean = false;

  constructor() {
    this.stabilizer = new DOMStabilizer();
    this.styleExtractor = new StyleExtractor();
    this.assetScanner = new AssetScanner();
    
    this.setupMessageListener();
    this.setupPageObserver();
  }

  private setupMessageListener(): void {
    chrome.runtime.onMessage.addListener((message, sender, sendResponse) => {
      if (message.action === 'CLONE_PAGE') {
        if (this.isCapturing) {
          sendResponse({ success: false, error: 'Captura en progreso' });
          return;
        }
        
        this.cloneCurrentPage()
          .then(data => sendResponse({ success: true, data }))
          .catch(error => sendResponse({ success: false, error: error.message }));
        return true; // Mantener el canal abierto para respuesta asíncrona
      }
      
      if (message.action === 'GET_PAGE_INFO') {
        sendResponse({
          success: true,
          data: {
            title: document.title,
            url: window.location.href,
            ready: document.readyState === 'complete'
          }
        });
        return false;
      }
    });
  }

  private setupPageObserver(): void {
    // Observar cambios en el estado de la página
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', () => {
        console.log('N8N Web Cloner: DOM cargado');
      });
    }
    
    window.addEventListener('load', () => {
      console.log('N8N Web Cloner: Página completamente cargada');
    });
  }

  private async cloneCurrentPage(): Promise<ExtractionData> {
    try {
      this.isCapturing = true;
      console.log('N8N Web Cloner: Iniciando captura...');

      // 1. Verificar que la página esté lista
      if (document.readyState !== 'complete') {
        await this.waitForPageLoad();
      }

      // 2. Esperar a que el DOM se estabilice
      console.log('N8N Web Cloner: Esperando estabilidad del DOM...');
      await this.stabilizer.waitForStability();
      
      // 3. Esperar recursos adicionales
      await this.stabilizer.waitForResources();
      
      // 4. Capturar el HTML del estado final
      console.log('N8N Web Cloner: Capturando HTML...');
      const html = this.captureHTML();
      
      // 5. Extraer estilos computados de todos los elementos
      console.log('N8N Web Cloner: Extrayendo estilos...');
      const styles = this.styleExtractor.extractAllStyles();
      
      // 6. Escanear activos (imágenes, videos, etc.)
      console.log('N8N Web Cloner: Escaneando activos...');
      const assets = this.assetScanner.scanAssets();
      
      // 7. Recopilar metadata de la página
      const metadata: PageMetadata = {
        title: document.title,
        description: this.getMetaDescription(),
        viewport: this.getViewport(),
        url: window.location.href,
        timestamp: Date.now()
      };

      console.log('N8N Web Cloner: Captura completada', {
        htmlLength: html.length,
        stylesCount: styles.length,
        assetsCount: assets.length
      });

      return {
        html,
        styles,
        assets,
        metadata
      };
    } catch (error) {
      console.error('N8N Web Cloner: Error clonando página:', error);
      throw error;
    } finally {
      this.isCapturing = false;
    }
  }

  private async waitForPageLoad(): Promise<void> {
    return new Promise((resolve) => {
      if (document.readyState === 'complete') {
        resolve();
        return;
      }
      
      const checkReady = () => {
        if (document.readyState === 'complete') {
          resolve();
        } else {
          setTimeout(checkReady, 100);
        }
      };
      
      checkReady();
    });
  }

  private captureHTML(): string {
    // Capturar el HTML completo del documento
    // Excluir scripts y estilos que no necesitamos
    const clonedDoc = document.cloneNode(true) as Document;
    
    // Remover scripts innecesarios
    const scripts = clonedDoc.querySelectorAll('script');
    scripts.forEach(script => {
      // Mantener solo scripts esenciales o remover todos
      if (!script.src || !this.isEssentialScript(script.src)) {
        script.remove();
      }
    });
    
    return clonedDoc.documentElement.outerHTML;
  }

  private isEssentialScript(src: string): boolean {
    // Determinar si un script es esencial para el layout
    const essentialPatterns = [
      'polyfill',
      'modernizr',
      'jquery',
      'bootstrap'
    ];
    
    return essentialPatterns.some(pattern => 
      src.toLowerCase().includes(pattern)
    );
  }

  private getMetaDescription(): string {
    const metaDesc = document.querySelector('meta[name="description"]');
    return metaDesc ? metaDesc.getAttribute('content') || '' : '';
  }

  private getViewport(): string {
    const metaViewport = document.querySelector('meta[name="viewport"]');
    return metaViewport ? metaViewport.getAttribute('content') || '' : '';
  }
}

// Extend Window interface
declare global {
  interface Window {
    n8nWebClonerInitialized?: boolean;
  }
}

// Inicializar el content script solo si no está ya inicializado
if (!window.n8nWebClonerInitialized) {
  window.n8nWebClonerInitialized = true;
  new WebClonerContentScript();
}
