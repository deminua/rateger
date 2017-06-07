
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/*var CryptoJS = require("crypto-js");
Vue.use(CryptoJS);*/


//Vue.use(require('vue-resource-2'));
//Vue.use(require('vue-router'));

//Vue.component('VueCrypt', require('./components/Vuecrypt.vue'));

/*
var CryptoJS = require("crypto-js");

var data = "123";
var key = '59b6ab46d379b89d794c87b74a511fbd59b6ab46d379b89d794c87b74a511fbd';
var iv = '0aaff094b6dc29742cc98a4bac8bc8f9';

var encrypted = CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(data), CryptoJS.enc.Hex.parse(key), { iv: CryptoJS.enc.Hex.parse(iv) });

console.log('Ciphertext: [' + encrypted.ciphertext + ']');
console.log('Key:        [' + encrypted.key + ']');
//cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Hex.parse(encrypted.ciphertext.toString())});

cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Hex.parse(encrypted.ciphertext.toString())});
var decrypted = CryptoJS.AES.decrypt(cipherParams, CryptoJS.enc.Hex.parse(key), { iv: CryptoJS.enc.Hex.parse(iv) });

console.log( 'Cleartext:  [' + decrypted.toString(CryptoJS.enc.Utf8) + ']');
*/


//Vue.component('Sign', require('./components/Sign.vue'));
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import VueRouter from 'vue-router'
//Vue.use(VueRouter)

//import Sign from './components/Sign.vue';

//Vue.component('example', require('./components/Example.vue'));
Vue.component('vuecrypt', require('./components/Vuecrypt.vue'));
//Vue.component('langdetect', require('./components/LangDetect.vue'));
//Vue.component('rategermenu', require('./components/RategerMenu.vue'));
//Vue.component('sign', require('./components/Sign.vue'));

const app = new Vue({
    el: '#app',
    props: {
       //messages: [String, Number],
        //monthMessage: [String, Number],
    }
/*
    data () {
        return {
            content: "I've been proxied!",
        }
    },
*/


    //components: {
        // <my-component> будет доступен только в шаблоне родителя
    //    'my-component': Child
    //}
    //components: { VueCrypt }
});

