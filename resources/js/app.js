import './bootstrap';

let deferredPrompt;

window.addEventListener('beforeinstallprompt', (e) => {
    e.preventDefault(); // Cegah prompt otomatis
    deferredPrompt = e;

    const installBtn = document.getElementById('installPwaBtn');
    if (installBtn) {
        installBtn.style.display = 'block';

        installBtn.addEventListener('click', () => {
            deferredPrompt.prompt();
            deferredPrompt.userChoice.then((choiceResult) => {
                if (choiceResult.outcome === 'accepted') {
                    console.log('User accepted the install prompt');
                } else {
                    console.log('User dismissed the install prompt');
                }
                deferredPrompt = null;
            });
        });
    }
});

