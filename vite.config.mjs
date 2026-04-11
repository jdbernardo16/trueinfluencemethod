import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig(({ command }) => {
    const isBuild = command === "build";

    return {
        base: isBuild ? "/wp-content/themes/tim-wordpress/dist/" : "/",
        server: {
            port: 3000,
            cors: true,
            origin: "http://localhost:8000",
        },
        build: {
            manifest: true,
            outDir: "dist",
            rollupOptions: {
                input: [
                    "resources/js/theme.js",
                    "resources/js/app.js",
                    "resources/css/app.css",
                    "resources/css/editor-style.css",
                ],
                output: {
                    entryFileNames: (chunkInfo) => {
                        // Keep theme.js as is, hash others
                        return chunkInfo.name === "theme"
                            ? "theme.js"
                            : "[name]-[hash].js";
                    },
                    chunkFileNames: "[name]-[hash].js",
                    assetFileNames: (assetInfo) => {
                        // Keep editor-style.css as is, hash others
                        if (assetInfo.name === "editor-style.css") {
                            return "editor-style.css";
                        }
                        return "[name]-[hash][extname]";
                    },
                },
            },
        },
        plugins: [tailwindcss()],
    };
});
