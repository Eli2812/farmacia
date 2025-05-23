import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index_routes';
import vuetify from './plugins/vuetify'; // si estás usando Vuetify

const app = createApp(App);

app.use(router);
app.use(vuetify); // solo si usas Vuetify
app.mount('#app');
