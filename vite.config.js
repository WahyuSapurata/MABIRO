import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        VitePWA({
            registerType: 'autoUpdate',
            includeAssets: ['favicon.ico', 'logo-kpmb.png', 'Mabiro.png', 'Favicon.png'], // tambahkan aset penting
            manifest: {
                name: 'Mabiro App',
                short_name: 'Mabiro',
                description: 'Mabiro + Vite + PWA',
                start_url: '/',
                display: 'standalone',
                theme_color: '#710B28',
                background_color: '#710B28',
                icons: [
                    {
                        "src": "/icon-192x192.png",
                        "sizes": "192x192",
                        "type": "image/png"
                    },
                    {
                        "src": "/icon-512x512.png",
                        "sizes": "512x512",
                        "type": "image/png"
                    }
                ]
            },
        }),
    ],
});
