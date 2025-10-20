// Popup Script - Maneja la interfaz del popup
interface Config {
  backendUrl: string;
  wpUrl: string;
  wpUsername: string;
  wpPassword: string;
}

interface PageInfo {
  title: string;
  url: string;
  ready: boolean;
}

class PopupController {
  private config: Config;
  private isProcessing: boolean = false;

  constructor() {
    this.config = {
      backendUrl: '',
      wpUrl: '',
      wpUsername: '',
      wpPassword: ''
    };
    
    this.loadConfig();
    this.setupEventListeners();
    this.loadPageInfo();
  }

  private async loadConfig(): Promise<void> {
    try {
      const result = await chrome.storage.sync.get([
        'backendUrl',
        'wpUrl', 
        'wpUsername',
        'wpPassword'
      ]);
      
      this.config = {
        backendUrl: result.backendUrl || 'http://localhost:3000',
        wpUrl: result.wpUrl || '',
        wpUsername: result.wpUsername || '',
        wpPassword: result.wpPassword || ''
      };
      
      this.updateFormFields();
    } catch (error) {
      console.error('Error cargando configuración:', error);
      this.showStatus('Error cargando configuración', 'error');
    }
  }

  private updateFormFields(): void {
    (document.getElementById('backendUrl') as HTMLInputElement).value = this.config.backendUrl;
    (document.getElementById('wpUrl') as HTMLInputElement).value = this.config.wpUrl;
    (document.getElementById('wpUsername') as HTMLInputElement).value = this.config.wpUsername;
    (document.getElementById('wpPassword') as HTMLInputElement).value = this.config.wpPassword;
  }

  private setupEventListeners(): void {
    // Botón Guardar Configuración
    document.getElementById('saveConfig')?.addEventListener('click', () => {
      this.saveConfig();
    });

    // Botón Clonar Página
    document.getElementById('clonePage')?.addEventListener('click', () => {
      this.cloneCurrentPage();
    });

    // Validación en tiempo real
    const inputs = document.querySelectorAll('input[required]');
    inputs.forEach(input => {
      input.addEventListener('input', () => {
        this.validateForm();
      });
    });

    // Enter para clonar
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' && !this.isProcessing) {
        this.cloneCurrentPage();
      }
    });
  }

  private async loadPageInfo(): Promise<void> {
    try {
      const [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
      
      if (!tab.id) {
        this.showStatus('No se pudo obtener información de la pestaña', 'error');
        return;
      }

      // Obtener información de la página actual
      const response = await chrome.tabs.sendMessage(tab.id, { action: 'GET_PAGE_INFO' });
      
      if (response?.success) {
        const pageInfo: PageInfo = response.data;
        this.displayPageInfo(pageInfo);
      } else {
        this.showStatus('No se pudo obtener información de la página', 'error');
      }
    } catch (error) {
      console.error('Error obteniendo información de la página:', error);
      this.showStatus('Error obteniendo información de la página', 'error');
    }
  }

  private displayPageInfo(pageInfo: PageInfo): void {
    const pageInfoElement = document.getElementById('pageInfo');
    const pageTitleElement = document.getElementById('pageTitle');
    const pageUrlElement = document.getElementById('pageUrl');
    
    if (pageInfoElement && pageTitleElement && pageUrlElement) {
      pageTitleElement.textContent = pageInfo.title || 'Sin título';
      pageUrlElement.textContent = pageInfo.url || 'URL no disponible';
      
      if (pageInfo.ready) {
        pageInfoElement.style.display = 'block';
      } else {
        this.showStatus('La página aún se está cargando. Espera un momento.', 'info');
      }
    }
  }

  private async saveConfig(): Promise<void> {
    try {
      this.showStatus('Guardando configuración...', 'loading');
      
      // Obtener valores del formulario
      this.config.backendUrl = (document.getElementById('backendUrl') as HTMLInputElement).value.trim();
      this.config.wpUrl = (document.getElementById('wpUrl') as HTMLInputElement).value.trim();
      this.config.wpUsername = (document.getElementById('wpUsername') as HTMLInputElement).value.trim();
      this.config.wpPassword = (document.getElementById('wpPassword') as HTMLInputElement).value.trim();

      // Validar configuración
      if (!this.validateConfig()) {
        return;
      }

      // Guardar en storage
      await chrome.storage.sync.set({
        backendUrl: this.config.backendUrl,
        wpUrl: this.config.wpUrl,
        wpUsername: this.config.wpUsername,
        wpPassword: this.config.wpPassword
      });

      this.showStatus('✅ Configuración guardada correctamente', 'success');
      
      // Habilitar botón de clonar
      this.updateCloneButtonState();
      
    } catch (error) {
      console.error('Error guardando configuración:', error);
      this.showStatus('❌ Error guardando configuración', 'error');
    }
  }

  private validateConfig(): boolean {
    const errors: string[] = [];

    if (!this.config.backendUrl) {
      errors.push('URL del backend es requerida');
    } else if (!this.isValidUrl(this.config.backendUrl)) {
      errors.push('URL del backend no es válida');
    }

    if (!this.config.wpUrl) {
      errors.push('URL de WordPress es requerida');
    } else if (!this.isValidUrl(this.config.wpUrl)) {
      errors.push('URL de WordPress no es válida');
    }

    if (!this.config.wpUsername) {
      errors.push('Usuario de WordPress es requerido');
    }

    if (!this.config.wpPassword) {
      errors.push('Contraseña de aplicación es requerida');
    }

    if (errors.length > 0) {
      this.showStatus(`❌ ${errors.join(', ')}`, 'error');
      return false;
    }

    return true;
  }

  private isValidUrl(url: string): boolean {
    try {
      new URL(url);
      return true;
    } catch {
      return false;
    }
  }

  private validateForm(): void {
    const isValid = this.validateConfig();
    this.updateCloneButtonState();
  }

  private updateCloneButtonState(): void {
    const cloneButton = document.getElementById('clonePage') as HTMLButtonElement;
    const isValid = this.validateConfig();
    
    cloneButton.disabled = !isValid || this.isProcessing;
    
    if (this.isProcessing) {
      cloneButton.innerHTML = '<span class="loading-spinner"></span> Procesando...';
    } else {
      cloneButton.innerHTML = '🚀 Clonar Página';
    }
  }

  private async cloneCurrentPage(): Promise<void> {
    if (this.isProcessing) {
      return;
    }

    try {
      this.isProcessing = true;
      this.updateCloneButtonState();
      
      this.showStatus('🔄 Iniciando clonación...', 'loading');

      // Guardar configuración antes de clonar
      await this.saveConfig();
      
      // Obtener pestaña activa
      const [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
      
      if (!tab.id) {
        throw new Error('No se pudo obtener la pestaña activa');
      }

      // Enviar mensaje al content script para clonar
      this.showStatus('📸 Capturando página...', 'loading');
      
      const response = await chrome.tabs.sendMessage(tab.id, { action: 'CLONE_PAGE' });
      
      if (!response?.success) {
        throw new Error(response?.error || 'Error desconocido en la captura');
      }

      // Enviar datos al backend
      this.showStatus('🔄 Procesando en backend...', 'loading');
      
      const backendResponse = await this.sendToBackend(response.data);
      
      if (!backendResponse.success) {
        throw new Error(backendResponse.error || 'Error en el backend');
      }

      // Enviar a WordPress
      this.showStatus('📤 Enviando a WordPress...', 'loading');
      
      const wpResponse = await this.sendToWordPress(backendResponse.data);
      
      if (!wpResponse.success) {
        throw new Error(wpResponse.error || 'Error enviando a WordPress');
      }

      // Éxito
      this.showStatus(
        `✅ ¡Página clonada exitosamente!<br>
         <a href="${wpResponse.data.link}" target="_blank" style="color: #2563eb; text-decoration: underline;">
           Ver página creada
         </a>`, 
        'success'
      );

    } catch (error) {
      console.error('Error clonando página:', error);
      const errorMessage = error instanceof Error ? error.message : 'Error desconocido';
      this.showStatus(`❌ Error: ${errorMessage}`, 'error');
    } finally {
      this.isProcessing = false;
      this.updateCloneButtonState();
    }
  }

  private async sendToBackend(data: any): Promise<any> {
    const response = await fetch(`${this.config.backendUrl}/api/extract`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(data)
    });

    if (!response.ok) {
      throw new Error(`Error del backend: ${response.status} ${response.statusText}`);
    }

    return await response.json();
  }

  private async sendToWordPress(data: any): Promise<any> {
    const response = await fetch(`${this.config.backendUrl}/api/convert`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        ...data,
        wpConfig: {
          url: this.config.wpUrl,
          username: this.config.wpUsername,
          password: this.config.wpPassword
        }
      })
    });

    if (!response.ok) {
      throw new Error(`Error enviando a WordPress: ${response.status} ${response.statusText}`);
    }

    return await response.json();
  }

  private showStatus(message: string, type: 'success' | 'error' | 'info' | 'loading'): void {
    const statusElement = document.getElementById('status');
    
    if (statusElement) {
      statusElement.innerHTML = message;
      statusElement.className = `status ${type}`;
      statusElement.style.display = 'block';
      
      // Auto-ocultar mensajes de éxito después de 5 segundos
      if (type === 'success') {
        setTimeout(() => {
          statusElement.style.display = 'none';
        }, 5000);
      }
    }
  }
}

// Inicializar cuando el DOM esté listo
document.addEventListener('DOMContentLoaded', () => {
  new PopupController();
});