// Style Extractor - Extrae estilos computados de elementos del DOM
import { ComputedStyleMap } from '@n8n/web-cloner-shared';

export class StyleExtractor {
  private readonly IMPORTANT_PROPERTIES = [
    // Layout
    'width', 'height', 'min-width', 'min-height', 'max-width', 'max-height',
    'margin', 'margin-top', 'margin-right', 'margin-bottom', 'margin-left',
    'padding', 'padding-top', 'padding-right', 'padding-bottom', 'padding-left',
    'position', 'top', 'right', 'bottom', 'left', 'z-index',
    
    // Typography
    'font-family', 'font-size', 'font-weight', 'font-style', 'font-variant',
    'color', 'line-height', 'letter-spacing', 'word-spacing', 'text-align',
    'text-decoration', 'text-transform', 'text-shadow',
    
    // Visual
    'background', 'background-color', 'background-image', 'background-size',
    'background-position', 'background-repeat', 'background-attachment',
    'border', 'border-top', 'border-right', 'border-bottom', 'border-left',
    'border-radius', 'border-width', 'border-style', 'border-color',
    'box-shadow', 'opacity', 'visibility', 'overflow', 'overflow-x', 'overflow-y',
    
    // Flexbox/Grid
    'display', 'flex-direction', 'flex-wrap', 'justify-content', 'align-items',
    'align-content', 'flex-grow', 'flex-shrink', 'flex-basis', 'order',
    'grid-template-columns', 'grid-template-rows', 'grid-template-areas',
    'grid-gap', 'grid-column-gap', 'grid-row-gap', 'grid-auto-columns',
    'grid-auto-rows', 'grid-auto-flow', 'justify-items', 'align-items',
    'place-items', 'justify-self', 'align-self', 'place-self'
  ];

  extractAllStyles(): ComputedStyleMap[] {
    const allElements = this.getAllElements();
    const styleMaps: ComputedStyleMap[] = [];

    allElements.forEach(element => {
      const styleMap = this.extractElementStyles(element);
      if (styleMap) {
        styleMaps.push(styleMap);
      }
    });

    return styleMaps;
  }

  private getAllElements(): Element[] {
    // Obtener todos los elementos del DOM, excluyendo scripts y estilos
    const allElements = document.querySelectorAll('*');
    const filteredElements: Element[] = [];

    allElements.forEach(element => {
      const tagName = element.tagName.toLowerCase();
      
      // Excluir elementos que no necesitamos clonar
      if (!['script', 'style', 'meta', 'link', 'title', 'head'].includes(tagName)) {
        filteredElements.push(element);
      }
    });

    return filteredElements;
  }

  private extractElementStyles(element: Element): ComputedStyleMap | null {
    try {
      const computedStyle = window.getComputedStyle(element);
      const elementId = this.getElementId(element);
      const styles: Record<string, string> = {};

      // Extraer solo las propiedades importantes
      this.IMPORTANT_PROPERTIES.forEach(property => {
        const value = computedStyle.getPropertyValue(property);
        if (value && value !== 'initial' && value !== 'inherit') {
          styles[property] = value;
        }
      });

      // Solo incluir elementos que tengan estilos relevantes
      if (Object.keys(styles).length > 0) {
        return {
          elementId,
          elementTag: element.tagName.toLowerCase(),
          styles
        };
      }

      return null;
    } catch (error) {
      console.warn('Error extrayendo estilos del elemento:', element, error);
      return null;
    }
  }

  private getElementId(element: Element): string {
    // Generar un ID único para el elemento
    if (element.id) {
      return element.id;
    }

    // Si no tiene ID, generar uno basado en su posición en el DOM
    const path: number[] = [];
    let current: Element | null = element;

    while (current && current !== document.body) {
      const parent: Element | null = current.parentElement;
      if (parent) {
        const index = Array.from(parent.children).indexOf(current);
        path.unshift(index);
      }
      current = parent;
    }

    return `element-${path.join('-')}`;
  }

  // Método para extraer estilos de un elemento específico
  extractElementStylesById(elementId: string): ComputedStyleMap | null {
    const element = document.getElementById(elementId) || 
                   document.querySelector(`[data-element-id="${elementId}"]`);
    
    if (!element) {
      return null;
    }

    return this.extractElementStyles(element);
  }

  // Método para obtener estilos CSS de hojas de estilo externas
  extractExternalStyles(): string[] {
    const stylesheets: string[] = [];
    
    // Obtener estilos inline
    const styleElements = document.querySelectorAll('style');
    styleElements.forEach(style => {
      if (style.textContent) {
        stylesheets.push(style.textContent);
      }
    });

    // Obtener URLs de hojas de estilo externas
    const linkElements = document.querySelectorAll('link[rel="stylesheet"]');
    linkElements.forEach(link => {
      const href = link.getAttribute('href');
      if (href) {
        stylesheets.push(href);
      }
    });

    return stylesheets;
  }
}
