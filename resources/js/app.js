import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import RouterWeb from './router/index_routes';
import 'vuetify/styles';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';


const app = createApp(App);

const vuetify = createVuetify({
  components,
  directives,
})
app.use(RouterWeb);
app.use(vuetify); // Usa Vuetify en Vue
app.mount('#app');
