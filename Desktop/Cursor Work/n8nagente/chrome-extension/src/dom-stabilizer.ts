// DOM Stabilizer - Espera a que el DOM se estabilice antes de capturar
export class DOMStabilizer {
  private readonly STABILITY_DELAY = 300; // ms sin cambios para considerar estable
  private readonly MAX_WAIT_TIME = 8000; // tiempo máximo de espera
  private readonly RESOURCE_WAIT_TIME = 2000; // tiempo adicional para recursos

  async waitForStability(): Promise<void> {
    return new Promise((resolve, reject) => {
      let timeoutId: number;
      let stabilityTimer: number;
      let isStable = false;
      let mutationCount = 0;

      const mutationObserver = new MutationObserver((mutations) => {
        mutationCount += mutations.length;
        
        // Resetear el timer de estabilidad
        clearTimeout(stabilityTimer);
        stabilityTimer = window.setTimeout(() => {
          if (!isStable) {
            isStable = true;
            mutationObserver.disconnect();
            clearTimeout(timeoutId);
            console.log(`N8N Web Cloner: DOM estabilizado después de ${mutationCount} mutaciones`);
            resolve();
          }
        }, this.STABILITY_DELAY);
      });

      // Configurar timeout máximo
      timeoutId = window.setTimeout(() => {
        if (!isStable) {
          mutationObserver.disconnect();
          console.warn('N8N Web Cloner: Timeout esperando estabilidad del DOM');
          reject(new Error('Timeout esperando estabilidad del DOM'));
        }
      }, this.MAX_WAIT_TIME);

      // Iniciar observación con configuración optimizada
      mutationObserver.observe(document.body, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeOldValue: false,
        characterData: false, // Deshabilitado para mejor rendimiento
        characterDataOldValue: false
      });

      // Timer inicial de estabilidad
      stabilityTimer = window.setTimeout(() => {
        if (!isStable) {
          isStable = true;
          mutationObserver.disconnect();
          clearTimeout(timeoutId);
          console.log('N8N Web Cloner: DOM estable desde el inicio');
          resolve();
        }
      }, this.STABILITY_DELAY);
    });
  }

  // Método adicional para esperar a que se carguen recursos específicos
  async waitForResources(): Promise<void> {
    const promises: Promise<void>[] = [];

    // Esperar a que se carguen todas las imágenes críticas
    const images = Array.from(document.querySelectorAll('img'));
    const criticalImages = images.filter(img => this.isCriticalImage(img));
    
    criticalImages.forEach(img => {
      if (!img.complete) {
        promises.push(new Promise(resolve => {
          const timeout = setTimeout(() => {
            console.warn(`N8N Web Cloner: Timeout cargando imagen: ${img.src}`);
            resolve();
          }, 3000);
          
          img.onload = () => {
            clearTimeout(timeout);
            resolve();
          };
          img.onerror = () => {
            clearTimeout(timeout);
            resolve(); // Continuar aunque falle
          };
        }));
      }
    });

    // Esperar a que se carguen fuentes críticas
    const fontPromise = this.waitForCriticalFonts();
    promises.push(fontPromise);

    // Esperar un tiempo adicional para animaciones CSS
    promises.push(new Promise(resolve => setTimeout(resolve, this.RESOURCE_WAIT_TIME)));

    try {
      await Promise.all(promises);
      console.log('N8N Web Cloner: Recursos críticos cargados');
    } catch (error) {
      console.warn('N8N Web Cloner: Error cargando recursos:', error);
    }
  }

  private isCriticalImage(img: HTMLImageElement): boolean {
    // Determinar si una imagen es crítica para el layout
    const rect = img.getBoundingClientRect();
    const isVisible = rect.width > 0 && rect.height > 0;
    const isAboveFold = rect.top < window.innerHeight;
    
    // Considerar crítica si es visible y está arriba del fold
    return isVisible && isAboveFold;
  }

  private async waitForCriticalFonts(): Promise<void> {
    // Verificar si document.fonts está disponible
    if ('fonts' in document && 'ready' in document.fonts) {
      try {
        await document.fonts.ready;
        console.log('N8N Web Cloner: Fuentes cargadas');
      } catch (error) {
        console.warn('N8N Web Cloner: Error esperando fuentes:', error);
      }
    } else {
      // Fallback: esperar un tiempo fijo
      await new Promise<void>(resolve => setTimeout(resolve, 1000));
    }
  }

  // Método para detectar si hay animaciones CSS activas
  async waitForAnimations(): Promise<void> {
    return new Promise((resolve) => {
      const animatedElements = document.querySelectorAll('*');
      let activeAnimations = 0;

      animatedElements.forEach(element => {
        const computedStyle = window.getComputedStyle(element);
        const animationName = computedStyle.animationName;
        const transitionProperty = computedStyle.transitionProperty;
        
        if (animationName !== 'none' || transitionProperty !== 'all') {
          activeAnimations++;
        }
      });

      if (activeAnimations === 0) {
        resolve();
        return;
      }

      // Esperar a que las animaciones terminen
      setTimeout(() => {
        console.log(`N8N Web Cloner: ${activeAnimations} animaciones detectadas, esperando...`);
        resolve();
      }, 1000);
    });
  }

  // Método para detectar lazy loading
  async waitForLazyContent(): Promise<void> {
    const lazyImages = document.querySelectorAll('img[data-src], img[data-lazy-src]');
    
    if (lazyImages.length === 0) {
      return;
    }

    console.log(`N8N Web Cloner: ${lazyImages.length} imágenes lazy detectadas`);
    
    // Scroll suave para activar lazy loading
    const scrollHeight = document.documentElement.scrollHeight;
    const currentScroll = window.pageYOffset;
    
    if (currentScroll < scrollHeight - window.innerHeight) {
      window.scrollTo({
        top: scrollHeight,
        behavior: 'smooth'
      });
      
      // Esperar un poco después del scroll
      await new Promise(resolve => setTimeout(resolve, 1000));
      
      // Volver al top
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
      
      await new Promise(resolve => setTimeout(resolve, 500));
    }
  }
}
