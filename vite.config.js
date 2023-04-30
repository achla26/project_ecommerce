import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue"; //add this line
import laravel from "laravel-vite-plugin";

export default defineConfig({
    base: '/',
    plugins: [
        vue({
            template: {
            transformAssetUrls: {
            base: null,
            includeAbsolute: false,
            },
            },
            }),
        laravel({
            input: [
                "resources/css/app.css", 
                "resources/js/app.js",
                "resources/js/pages/category.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            'vue': 'vue/dist/vue.esm-bundler.js'
        },
    },
});