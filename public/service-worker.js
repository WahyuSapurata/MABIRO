const CACHE_NAME = 'Mabiro-V1';

self.addEventListener('install', (event) => {
    console.log('[Service Worker] Installing...');

    event.waitUntil(
        fetch('/asset-list')
            .then((res) => {
                if (!res.ok) {
                    throw new Error(`HTTP error! Status: ${res.status}`);
                }
                return res.json();
            })
            .then((files) => {
                const cacheFiles = [
                    '/',               // Halaman utama
                    '/manifest.json',  // Manifest PWA
                    '/icon-192x192.png',
                    '/icon-512x512.png',
                    ...files           // Semua file dari folder assets
                ];

                return caches.open(CACHE_NAME).then((cache) => {
                    console.log('[Service Worker] Caching all files:', cacheFiles);

                    return Promise.allSettled(
                        cacheFiles.map(file =>
                            fetch(file).then(response => {
                                if (response.ok) {
                                    return cache.put(file, response.clone());
                                } else {
                                    console.warn('Gagal caching:', file, response.status);
                                }
                            }).catch(err => {
                                console.warn('Fetch error untuk:', file, err);
                            })
                        )
                    );
                });
            })
            .catch(err => {
                console.error('Install SW gagal:', err);
            })
    );
});

self.addEventListener('fetch', (event) => {
    event.respondWith(
        caches.match(event.request).then((cachedResponse) => {
            return cachedResponse || fetch(event.request);
        })
    );
});

self.addEventListener('activate', (event) => {
    event.waitUntil(
        caches.keys().then((keyList) => {
            return Promise.all(
                keyList.map((key) => {
                    if (key !== CACHE_NAME) {
                        console.log('[Service Worker] Deleting old cache:', key);
                        return caches.delete(key);
                    }
                })
            );
        })
    );
});
