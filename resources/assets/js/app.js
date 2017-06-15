
require('./bootstrap');

window.Vue = require('vue');

//import VueRouter from 'vue-router'
//Vue.use(VueRouter)

Vue.component('vuecrypt', require('./components/Vuecrypt.vue'));

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
        this.ws = new WebSocket('ws://dserver.ddns.net:8081?sid='+window.Laravel.sid);
    }

    });


