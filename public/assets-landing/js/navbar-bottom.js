document.addEventListener('DOMContentLoaded', () => {
    const menuBtn = document.getElementById('menuBtn');
    const overlayMenu = document.getElementById('overlayMenu');
    const closeExpand = document.getElementById('closeExpand');

    menuBtn.addEventListener('click', () => {
        menuBtn.classList.toggle('open');
        overlayMenu.classList.toggle('show');
        document.body.classList.toggle('modal-open');
    });

    closeExpand.addEventListener('click', () => {
        menuBtn.classList.remove('open');
        overlayMenu.classList.remove('show');
        document.body.classList.remove('modal-open');
    });

    overlayMenu.addEventListener('click', function (e) {
        if (e.target === this) {
            menuBtn.classList.remove('open');
            overlayMenu.classList.remove('show');
            document.body.classList.remove('modal-open');
        }
    });
});
