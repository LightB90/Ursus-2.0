var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/css/app.css',
    '/css/2buttons.css',
    '/css/3buttons.css',
    '/css/4buttons.css',
    '/css/5buttons.css',
    '/css/6buttons.css',
    '/css/7buttons.css',
    '/css/8buttons.css',
    '/css/8buttons.css',
    '/css/bootstrap.min.css',
    '/css/summernote-bs4.min.css',
    '/css/toastr.min.css',
    '/css/home.css',
    '/fonts/ARIALN.woff',
    '/fonts/ARIALNB.woff',
    '/images/*',
    '/js/app.js',
    '/js/jquery-3.3.1.js',
    '/js/bootstrap.min.js',
    '/js/popper.min.js',
    '/js/summernote-bs4.min.js',
    '/js/toastr.min.js',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-512x512.png',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
