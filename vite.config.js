import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        // Ajoutez une configuration pour servir les images statiques
        // à partir du répertoire public/images
        fs: {
            strict: false,
            serve: {
                // Lorsque le navigateur demande une image, elle sera servie à partir de ce chemin
                '/images': 'public/images',
            },
        },
    },
});
