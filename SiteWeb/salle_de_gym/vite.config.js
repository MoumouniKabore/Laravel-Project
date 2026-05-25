import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        // Plugin Laravel : indique à Vite quels fichiers compiler
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true, // Rafraîchit le navigateur automatiquement
        }),

        // Plugin Vue : permet à Vite de compiler les fichiers .vue
        vue({
            template: {
                transformAssetUrls: {
                    // Inertia gère l'URL de base, pas besoin que Vue le fasse
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),

        // Plugin Tailwind : intègre Tailwind dans le pipeline Vite
        tailwindcss(),
    ],
});