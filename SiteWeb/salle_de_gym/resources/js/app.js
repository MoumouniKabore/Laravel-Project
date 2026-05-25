// === IMPORTS ===
import { createApp, h } from 'vue';                  // Vue 3
import { createInertiaApp } from '@inertiajs/vue3';   // Inertia pour Vue
import { ZiggyVue } from '../../vendor/tightenco/ziggy'; // Ziggy pour les routes
import '../css/app.css';                               // Nos styles Tailwind

// === INITIALISATION DE L'APPLICATION ===
createInertiaApp({
    // Définit le titre de la page
    // Ex: si la page renvoie title "Accueil" → affiche "Accueil - Mon App"
    title: (title) => `${title} - Mon App`,

    // Charge dynamiquement le composant Vue correspondant à la page
    // Ex: si Inertia demande "Home" → charge resources/js/Pages/Home.vue
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },

    // Configure et monte l'application Vue
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)    // Active le plugin Inertia
            .use(ZiggyVue)  // Active Ziggy (fonction route() disponible partout)
            .mount(el);     // Monte l'app sur l'élément #app
    },

    // Affiche la barre de progression lors des navigations entre pages
    progress: {
        color: '#4B5563', // Couleur de la barre (gris foncé)
    },
});