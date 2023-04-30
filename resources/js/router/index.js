import { createRouter, createWebHistory } from vue-router
import CustomTable from './components/CustomTable.vue'
const routes=[
    {
        path:'/',
        name: 'home',
        component: CustomTable
    }
];

const router = createRouter ( {
    history: createWebHistory (import.meta.env. BASE_URL),
    routes
});

export default router;