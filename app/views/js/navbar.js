const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');
const userMenuButton = document.getElementById('user-menu-button');
const userMenu = document.getElementById('user-menu');

mobileMenuButton.addEventListener('click', () => {
    const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true' || false;
    mobileMenuButton.setAttribute('aria-expanded', !expanded);
    mobileMenu.classList.toggle('hidden');
});

userMenuButton.addEventListener('click', () => {
    userMenu.classList.toggle('hidden');
});

// Cerrar el menú cuando se haga clic fuera de él
window.addEventListener('click', (event) => {
    if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
        if (!userMenu.classList.contains('hidden')) {
            userMenu.classList.add('hidden');
        }
    }
});

// Evitar el cierre del menú cuando se haga clic en el botón o en el menú
userMenuButton.addEventListener('click', (event) => {
    event.stopPropagation();
});

userMenu.addEventListener('click', (event) => {
    event.stopPropagation();
});