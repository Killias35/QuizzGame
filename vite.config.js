import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    build: {
        rollupOptions: {
            input: [
                'resources/js/quiz.js',
                'resources/css/quiz.css',
                'resources/css/special6.css', 
                'resources/js/special6.js'
            ]
        }
    }
});
