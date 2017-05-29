
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-resource-2'));
Vue.use(require('vue-router'));

Vue.component('Sign', require('./components/Sign.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import VueRouter from 'vue-router'
//Vue.use(VueRouter)

//import Sign from './components/Sign.vue';

//Vue.component('example', require('./components/Example.vue'));
//Vue.component('langdetect', require('./components/LangDetect.vue'));
//Vue.component('rategermenu', require('./components/RategerMenu.vue'));
//Vue.component('sign', require('./components/Sign.vue'));

const app = new Vue({
    el: '#app',
    //components: { Sign }
});

