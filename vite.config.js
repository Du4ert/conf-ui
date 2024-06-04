import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/main.scss',
                'resources/js/app.js',
                'resources/js/main-page.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~fonts': path.join(__dirname, 'resources/fonts'),
            '~images': path.join(__dirname, 'resources/images'),
        }
      }
});
