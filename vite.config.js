import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            input:['resources/adminlte/css/admin.css', 'resources/adminlte/js/admin.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
