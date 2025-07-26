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
            injectRegister: 'auto',
            manifestFilename: 'manifest.webmanifest',
            includeAssets: [
                'favicon.ico',
                'logo-kpmb.png',
                'Mabiro.png',
                'Favicon.png',
                'icon-192x192.png',
                'icon-512x512.png',
            ],
            manifest: {
                name: 'Mabiro App',
                short_name: 'Mabiro',
                description: 'Mabiro + Vite + PWA',
                start_url: '/',
                scope: '/',
                display: 'standalone',
                theme_color: '#710B28',
                background_color: '#710B28',
                icons: [
                    {
                        src: '/icon-192x192.png',
                        sizes: '192x192',
                        type: 'image/png'
                    },
                    {
                        src: '/icon-512x512.png',
                        sizes: '512x512',
                        type: 'image/png'
                    }
                ]
            },
            workbox: {
                globPatterns: ['**/*.{js,css,html,png,svg,ico,json,webmanifest}'],
                maximumFileSizeToCacheInBytes: 10 * 1024 * 1024
            }
        }),
    ],
    build: {
        manifest: true,
        outDir: 'public/build',
        emptyOutDir: true,
    }
});
