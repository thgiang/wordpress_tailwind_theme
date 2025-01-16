import { defineConfig } from 'vite';

export default defineConfig({
    build: {
        outDir: 'dist',
        emptyOutDir: true,
    },
    server: {
        proxy: {
            '/wp-content': 'http://localhost/wordpress',
        },
    },
});
