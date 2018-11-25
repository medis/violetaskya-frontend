// window._ = require('lodash');
// window.axios = require('axios');

import axios from 'axios';
import VueNotifications from 'vue-notifications';
import miniToastr from 'mini-toastr';
import VueRouter from 'vue-router';
import apolloProvider from './apollo';
import moment from 'moment';
import chunk from 'chunk';

window.Vue = require('vue');

window.moment = moment;
window.axios = axios;
window.chunk = chunk;

let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const toastTypes = {
    success: 'success',
    error: 'error',
    info: 'info',
    warn: 'warn'
};
miniToastr.init({types: toastTypes});
function toast ({title, message, type, timeout, cb}) {
    return miniToastr[type](message, title, timeout, cb)
};
const options = {
    success: toast,
    error: toast,
    info: toast,
    warn: toast
};

Vue.use(VueNotifications, options);

Vue.use(VueRouter);

/**
 * Vue routes.
 */
var FrontPage = require('./components/views/FrontPage.vue');
var ContactPage = require('./components/views/ContactPage.vue');
var BioPage = require('./components/views/BioPage.vue');
var MusicPage = require('./components/views/MusicPage.vue');
var PhotosPage = require('./components/views/PhotosPage.vue');
var ShowsPage = require('./components/views/ShowsPage.vue');
var PressPage = require('./components/views/PressPage.vue');

const routes = [
    { path: '/', component: FrontPage },
    { path: '/bio', component: BioPage },
    { path: '/shows', component: ShowsPage },
    { path: '/music', component: MusicPage },
    { path: '/photos', component: PhotosPage },
    { path: '/contact', component: ContactPage },
    { path: '/press', component: PressPage },
];

const router = new VueRouter({
    mode: 'history',
    routes,
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }
    }
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// VueJS instance for events.
window.Event = new Vue();

Vue.component('app', require('./components/App.vue'));

const app = new Vue({
    el: '#app',
    router,
    provide: apolloProvider.provide()
});
