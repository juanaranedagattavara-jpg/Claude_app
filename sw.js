// Service Worker para Sueño Andino
const CACHE_NAME = 'sueño-andino-v1.0.0';
const STATIC_CACHE = 'static-v1.0.0';
const DYNAMIC_CACHE = 'dynamic-v1.0.0';

// Recursos críticos para cache
const STATIC_ASSETS = [
    '/',
    '/index.html',
    '/assets/css/premium.css',
    '/assets/css/base.css',
    '/style.css',
    '/assets/js/main.js',
    '/assets/img/hero-background.jpg',
    '/assets/img/logo-sa-blanco.png',
    '/assets/img/galeria1.jpg',
    '/assets/img/galeria2.jpg',
    '/assets/img/galeria3.jpg',
    '/assets/img/galeria4.jpg',
    '/assets/img/galeria5.jpg',
    '/assets/img/galeria6.jpg',
    'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;500;600;700;800&display=swap'
];

// Instalación del Service Worker
self.addEventListener('install', event => {
    console.log('Service Worker: Instalando...');
    
    event.waitUntil(
        caches.open(STATIC_CACHE)
            .then(cache => {
                console.log('Service Worker: Cacheando recursos estáticos');
                return cache.addAll(STATIC_ASSETS);
            })
            .then(() => {
                console.log('Service Worker: Instalación completada');
                return self.skipWaiting();
            })
            .catch(error => {
                console.error('Service Worker: Error en instalación', error);
            })
    );
});

// Activación del Service Worker
self.addEventListener('activate', event => {
    console.log('Service Worker: Activando...');
    
    event.waitUntil(
        caches.keys()
            .then(cacheNames => {
                return Promise.all(
                    cacheNames.map(cacheName => {
                        if (cacheName !== STATIC_CACHE && cacheName !== DYNAMIC_CACHE) {
                            console.log('Service Worker: Eliminando cache antiguo', cacheName);
                            return caches.delete(cacheName);
                        }
                    })
                );
            })
            .then(() => {
                console.log('Service Worker: Activación completada');
                return self.clients.claim();
            })
    );
});

// Interceptar requests
self.addEventListener('fetch', event => {
    const { request } = event;
    const url = new URL(request.url);
    
    // Estrategia para recursos estáticos
    if (STATIC_ASSETS.includes(url.pathname) || url.pathname.endsWith('.css') || url.pathname.endsWith('.js')) {
        event.respondWith(
            caches.match(request)
                .then(response => {
                    if (response) {
                        console.log('Service Worker: Sirviendo desde cache', url.pathname);
                        return response;
                    }
                    
                    return fetch(request)
                        .then(fetchResponse => {
                            const responseClone = fetchResponse.clone();
                            caches.open(STATIC_CACHE)
                                .then(cache => {
                                    cache.put(request, responseClone);
                                });
                            return fetchResponse;
                        });
                })
        );
    }
    
    // Estrategia para imágenes
    else if (url.pathname.match(/\.(jpg|jpeg|png|gif|webp|svg)$/)) {
        event.respondWith(
            caches.match(request)
                .then(response => {
                    if (response) {
                        return response;
                    }
                    
                    return fetch(request)
                        .then(fetchResponse => {
                            const responseClone = fetchResponse.clone();
                            caches.open(DYNAMIC_CACHE)
                                .then(cache => {
                                    cache.put(request, responseClone);
                                });
                            return fetchResponse;
                        });
                })
        );
    }
    
    // Estrategia para HTML
    else if (request.headers.get('accept').includes('text/html')) {
        event.respondWith(
            caches.match(request)
                .then(response => {
                    if (response) {
                        return response;
                    }
                    
                    return fetch(request)
                        .then(fetchResponse => {
                            const responseClone = fetchResponse.clone();
                            caches.open(DYNAMIC_CACHE)
                                .then(cache => {
                                    cache.put(request, responseClone);
                                });
                            return fetchResponse;
                        })
                        .catch(() => {
                            return caches.match('/index.html');
                        });
                })
        );
    }
});

// Limpiar cache dinámico periódicamente
self.addEventListener('message', event => {
    if (event.data && event.data.type === 'CLEAN_CACHE') {
        caches.open(DYNAMIC_CACHE)
            .then(cache => {
                return cache.keys();
            })
            .then(keys => {
                keys.forEach((key, index) => {
                    if (index < keys.length - 50) { // Mantener solo las últimas 50 entradas
                        caches.open(DYNAMIC_CACHE)
                            .then(cache => {
                                cache.delete(key);
                            });
                    }
                });
            });
    }
});

// Notificaciones push (para futuras implementaciones)
self.addEventListener('push', event => {
    if (event.data) {
        const data = event.data.json();
        const options = {
            body: data.body,
            icon: '/assets/img/logo-sa-blanco.png',
            badge: '/assets/img/logo-sa-blanco.png',
            vibrate: [100, 50, 100],
            data: {
                dateOfArrival: Date.now(),
                primaryKey: 1
            }
        };
        
        event.waitUntil(
            self.registration.showNotification(data.title, options)
        );
    }
});

console.log('Service Worker: Cargado correctamente');