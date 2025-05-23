import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import path from 'path'; // 👈 Asegúrate de importar path

export default defineConfig({
  plugins: [
    vue(),
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/js'), // 👈 Define alias @ correctamente
      'vue': 'vue/dist/vue.esm-bundler',
    },
  },
  build: {
    chunkSizeWarningLimit: 1600,
  },
  css: {
    preprocessorOptions: {
      scss: {
        api: 'modern',
      },
    },
  }
});
