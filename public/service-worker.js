self.addEventListener('install', function (e) {
    e.waitUntil(
        caches.open('mabiro-cache').then(function (cache) {
            return cache.addAll([
                '/',
                '/css/app.css',
                '/js/app.js',
                '/icon-192x192.png',
                '/icon-512x512.png'
            ]);
        })
    );
});

self.addEventListener('fetch', function (e) {
    e.respondWith(
        caches.match(e.request).then(function (response) {
            return response || fetch(e.request);
        })
    );
});
