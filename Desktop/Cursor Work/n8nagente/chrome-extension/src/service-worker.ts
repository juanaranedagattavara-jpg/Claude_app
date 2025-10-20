// Service Worker - Maneja la comunicación entre componentes
import { ExtractionData } from '@n8n/web-cloner-shared';

interface Config {
  backendUrl: string;
  wpUrl: string;
  wpUsername: string;
  wpPassword: string;
}

class WebClonerServiceWorker {
  private config: Config | null = null;

  constructor() {
    this.setupMessageListener();
    this.loadConfig();
  }

  private setupMessageListener(): void {
    chrome.runtime.onMessage.addListener((message, sender, sendResponse) => {
      switch (message.action) {
        case 'SAVE_CONFIG':
          this.saveConfig(message.config);
          sendResponse({ success: true });
          break;
          
        case 'GET_CONFIG':
          sendResponse({ success: true, config: this.config });
          break;
          
        case 'CLONE_PAGE':
          this.handleCloneRequest(sender.tab?.id)
            .then(result => sendResponse(result))
            .catch(error => sendResponse({ success: false, error: error.message }));
          return true; // Mantener canal abierto
          
        default:
          sendResponse({ success: false, error: 'Acción no reconocida' });
      }
    });
  }

  private async loadConfig(): Promise<void> {
    try {
      const result = await chrome.storage.sync.get(['config']);
      this.config = result.config || null;
    } catch (error) {
      console.error('Error cargando configuración:', error);
    }
  }

  private async saveConfig(config: Config): Promise<void> {
    try {
      await chrome.storage.sync.set({ config });
      this.config = config;
    } catch (error) {
      console.error('Error guardando configuración:', error);
      throw error;
    }
  }

  private async handleCloneRequest(tabId?: number): Promise<{ success: boolean; data?: any; error?: string }> {
    if (!this.config) {
      return { success: false, error: 'Configuración no encontrada' };
    }

    if (!tabId) {
      return { success: false, error: 'No se pudo obtener el ID de la pestaña' };
    }

    try {
      // 1. Ejecutar el content script para capturar la página
      const results = await chrome.scripting.executeScript({
        target: { tabId },
        func: () => {
          // Esta función se ejecuta en el contexto de la página
          return new Promise((resolve) => {
            chrome.runtime.sendMessage({ action: 'CLONE_PAGE' }, resolve);
          });
        }
      });

      const result = results[0]?.result as { success: boolean; data?: ExtractionData; error?: string };
      if (!result || !result.success || !result.data) {
        return { success: false, error: result?.error || 'No se pudo extraer datos de la página' };
      }
      
      const extractionData = result.data;

      // 2. Enviar datos al backend para conversión
      const conversionResult = await this.sendToBackend(extractionData);
      
      // 3. Enviar resultado a WordPress
      const wpResult = await this.sendToWordPress(conversionResult);

      return { 
        success: true, 
        data: { 
          extractionData, 
          conversionResult, 
          wpResult 
        } 
      };
    } catch (error) {
      console.error('Error en proceso de clonación:', error);
      const errorMessage = error instanceof Error ? error.message : 'Error desconocido';
      return { success: false, error: errorMessage };
    }
  }

  private async sendToBackend(extractionData: ExtractionData): Promise<any> {
    if (!this.config?.backendUrl) {
      throw new Error('URL del backend no configurada');
    }

    const response = await fetch(`${this.config.backendUrl}/api/convert`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        data: extractionData,
        options: {
          target: 'elementor',
          preserveAssets: true,
          customCSS: true
        }
      })
    });

    if (!response.ok) {
      throw new Error(`Error del backend: ${response.statusText}`);
    }

    return await response.json();
  }

  private async sendToWordPress(conversionResult: any): Promise<any> {
    if (!this.config) {
      throw new Error('Configuración de WordPress no encontrada');
    }

    const { wpUrl, wpUsername, wpPassword } = this.config;
    
    // Crear página en WordPress
    const response = await fetch(`${wpUrl}/wp-json/wp/v2/pages`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': `Basic ${btoa(`${wpUsername}:${wpPassword}`)}`
      },
      body: JSON.stringify({
        title: conversionResult.title || 'Página Clonada',
        status: 'draft',
        content: conversionResult.content || '',
        meta: {
          _elementor_data: JSON.stringify(conversionResult.elementorData),
          _elementor_page_settings: JSON.stringify(conversionResult.pageSettings || {})
        }
      })
    });

    if (!response.ok) {
      throw new Error(`Error creando página en WordPress: ${response.statusText}`);
    }

    return await response.json();
  }
}

// Inicializar el service worker
new WebClonerServiceWorker();
