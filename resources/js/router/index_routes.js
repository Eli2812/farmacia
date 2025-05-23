import { createRouter, createWebHashHistory } from "vue-router";

const HomeComponent = () => import('../components/App.vue');
const dashboard = () => import('../components/Dashboard.vue');


const routes = [
    { 
        path: '/', 
        name: 'HomeVue', 
        component: HomeComponent 
    },
    { 
        path: '/dashboard', 
        name: 'dashboard', 
        component: dashboard 
    },
];
const router = createRouter({
    history: createWebHashHistory(import.meta.env.BASE_URL),
    routes
});
export default router;