import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import { createRequire } from "node:module";
const require = createRequire(import.meta.url);
import ckeditor5 from "@ckeditor/vite-plugin-ckeditor5";
import path from "node:path";

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/scss/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
        ckeditor5({ theme: require.resolve("@ckeditor/ckeditor5-theme-lark") }),
    ],
    // css: {
    //     preprocessorOptions: {
    //         scss: {
    //             additionalData: `@import "resources/css/app.scss";`,
    //         },
    //     },
    // },
    // resolve: {
    //     alias: {
    //         // You may need to adjust the path based on your project structure
    //         // "@": path.resolve(__dirname, "./resources"),
    //     },
    // },
});
