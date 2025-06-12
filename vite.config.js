import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';



export default defineConfig({
    define: {
        // Inject jQuery globally
        'window.jQuery': 'jquery',
        'window.$': 'jquery',
    },


    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/admin.css',
                'resources/js/admin.js'
            ],
            refresh: true,
        }),
    ],
});
