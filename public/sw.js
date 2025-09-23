self.addEventListener('fetch', (event) => {
    // Hanya handle request GET dan bukan untuk non-HTML (misalnya API calls)
    if (event.request.method !== 'GET' || !event.request.url.startsWith(self.location.origin)) {
        return;
    }
    event.respondWith(
        caches.match(event.request)
            .then((response) => {
                // Jika ada di cache, kembalikan dari cache
                if (response) {
                    return response;
                }

                // Jika tidak ada, fetch dari network dan cache hasilnya (stale-while-revalidate sederhana)
                return fetch(event.request).then((networkResponse) => {
                    // Clone response untuk caching
                    const responseToCache = networkResponse.clone();
                    caches.open(CACHE_NAME).then((cache) => {
                        cache.put(event.request, responseToCache);
                    });
                    return networkResponse;
                }).catch(() => {
                    // Fallback jika offline: Kembalikan halaman offline atau cache terdekat
                    // Misalnya, untuk root, kembalikan '/' dari cache
                    if (event.request.destination === 'document') {
                        return caches.match('/');  // Atau buat '/offline.html'
                    }
                    return new Response('Offline - Content not available', { status: 503 });
                });
            })
    );
});
