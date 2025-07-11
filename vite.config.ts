import vue from '@vitejs/plugin-vue';// Ce plugin permet à Vite de comprendre les fichiers .vue (sinon il ne saurait pas les interpréter).
import laravel from 'laravel-vite-plugin'; // On importe le plugin Laravel qui permet à Vite de bien intégrer les fichiers Laravel (Blade, assets, etc.).
import tailwindcss from '@tailwindcss/vite';
import { defineConfig } from 'vite';//On importe la fonction defineConfig de Vite, qui permet d’écrire une configuration proprement typée.

export default defineConfig({ 
    plugins: [
        laravel({
            input: ['resources/js/app.ts'],
            ssr: 'resources/js/ssr.ts',
            refresh: true, //permet à Laravel de recharger les fichiers automatiquement dans le navigateur pendant le développement.
        }),
        tailwindcss(),
        vue({ //On ajoute le plugin Vue à la configuration.
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
