const staticCacheName = "Standarde UB";
const cacheName = "standarde-v1";

var filesToCache = ["/"];

var i;
for (i = 0; i < 65; i++) {
    var x = filesToCache.push("/pagina?page="+i);
}


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
