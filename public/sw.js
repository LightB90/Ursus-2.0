const staticCacheName = "Standarde UB";
const cacheName = "standarde-v1";

var filesToCache = [
    "/",
    "/pagina?page=1",
    "/pagina?page=2",
    "/pagina?page=3",
    "/pagina?page=4",
    "/pagina?page=5",
    "/pagina?page=6",
    "/pagina?page=7",
    "/pagina?page=8",
    "/pagina?page=9",
    "/pagina?page=10",
    "/pagina?page=11",
];

self.addEventListener("install", function (e) {
    e.waitUntil(
        caches.open(staticCacheName).then(function (cache) {
            return cache.addAll(filesToCache);
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
    const cache = await caches.open(cacheName);
    try {
        const fresh = await fetch(req);
        cache.put(req, fresh.clone());
        return fresh;
    } catch (e) {
        return await cache.match(req);
    }
}

async function cacheFirst(req) {
    const cache = await caches.open(cacheName);
    const cachedResponse = await cache.match(req);
    return cachedResponse || networkFirst(req);
}
