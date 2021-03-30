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
    "/pagina?page=12",
    "/pagina?page=13",
    "/pagina?page=14",
    "/pagina?page=16",
    "/pagina?page=17",
    "/pagina?page=18",
    "/pagina?page=19",
    "/pagina?page=20",
    "/pagina?page=21",
    "/pagina?page=22",
    "/pagina?page=23",
    "/pagina?page=24",
    "/pagina?page=25",
    "/pagina?page=26",
    "/pagina?page=27",
    "/pagina?page=28",
    "/pagina?page=29",
    "/pagina?page=30",
    "/pagina?page=31",
    "/pagina?page=32",
    "/pagina?page=33",
    "/pagina?page=34",
    "/pagina?page=35",
    "/pagina?page=36",
    "/pagina?page=37",
    "/pagina?page=38",
    "/pagina?page=39",
    "/pagina?page=40",
    "/pagina?page=41",
    "/pagina?page=42",
    "/pagina?page=43",
    "/pagina?page=44",
    "/pagina?page=45",
    "/pagina?page=46",
    "/pagina?page=47",
    "/pagina?page=48",
    "/pagina?page=49",
    "/pagina?page=50",
    "/pagina?page=51",
    "/pagina?page=52",
    "/pagina?page=53",
    "/pagina?page=54",
    "/pagina?page=55",
    "/pagina?page=56",
    "/pagina?page=57",
    "/pagina?page=58",
    "/pagina?page=59",
    "/pagina?page=60",
    "/pagina?page=61",
    "/pagina?page=62",
    "/pagina?page=63",
    "/pagina?page=64",
    "/pagina?page=65",
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
