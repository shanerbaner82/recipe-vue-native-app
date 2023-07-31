/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './components/App.vue';
import Search from './components/Search.vue';
import ApiKey from './components/ApiKey.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        { path: '/', component: Search },
        { path: '/apikey', component: ApiKey },
    ]
});
const app = createApp(App);
app.use(router);
app.mount('#app');
