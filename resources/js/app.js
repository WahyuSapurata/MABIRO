import './bootstrap';
import { registerSW } from 'virtual:pwa-register'

console.log("📦 app.js loaded");

registerSW({
    immediate: true,
    onRegistered(r) {
        console.log('✅ Service Worker registered', r);
    },
    onRegisterError(error) {
        console.error('❌ SW registration failed', error);
    }
});
