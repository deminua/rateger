
require('./bootstrap');
//require('./three');

window.Vue = require('vue');

//import VueRouter from 'vue-router'
//Vue.use(VueRouter)

Vue.component('vuecrypt', require('./components/Vuecrypt.vue'));
Vue.component('three1', require('./components/Three1.vue'));

//VueWebsocket = new WebSocket('ws://dserver.ddns.net:8081?sid='+window.Laravel.sid);
//Vue.use(VueWebsocket);

// import VueWebsocket from "vue-websocket";
// Vue.use(VueWebsocket, "ws://dserver.ddns.net:8081", {
//     reconnection: false
// });


const app = new Vue({
    el: '#app',
    data () {
        return {
            ws: null
        }
    },
    created () {
        if (typeof window.Laravel.sid == 'string') {
            this.ws = new WebSocket('ws://dserver.ddns.net:8081?sid='+window.Laravel.sid);
        }
    }

    });


