const staticCacheName = "Standarde UB";

self.addEventListener("install", function (e) {
    e.waitUntil(
        caches.open(staticCacheName).then(function (cache) {
            return fetch('data.json').then(function(response) {
                return response.json();
            }).then(function(files) {
                console.log('[install] Adding files from JSON file: ', files);
                return cache.addAll(files);
            });
        }).then(function() {
            console.log(
                '[install] All required resources have been cached;',
                'the Service Worker was successfully installed!'
            );
            return self.skipWaiting();
        })
    );
});

self.addEventListener('fetch', function(e) {
    const req = e.request;

    if (/.*(json)$/.test(req.url)) {
        e.respondWith(networkFirst(req));
    } else {
        e.respondWith(cacheFirst(req));
    }
});

async function networkFirst(req) {
    const cache = await caches.open(staticCacheName);
    try {
        const fresh = await fetch(req);
        cache.put(req, fresh.clone());
        return fresh;
    } catch (e) {
        return await cache.match(req);
    }
}

async function cacheFirst(req) {
    const cache = await caches.open(staticCacheName);
    const cachedResponse = await cache.match(req);
    return cachedResponse || networkFirst(req);
}
