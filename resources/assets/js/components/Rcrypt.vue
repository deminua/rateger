<template>
    <li>{{ index }} | {{ parentMessage }} | {{ msg.id }} | {{ msg.text }}</li>


</template>

<script>

    var CryptoJS = require("crypto-js");
    Vue.use(CryptoJS);

    export default {
        name: 'RCrypt',
        props: ['index','parentMessage','msg'],
//        data(){
//            return {
//                testlistList: '...',
//            }
//        },
        methods: {
            getData: function () {

                //this.msg.text = 'Заменены значение и добавлен другой текст'+this.msg.text;
                //console.log(this.msg);
                //console.log(this.CryptoJS);
                //console.log(Vue.use(CryptoJS));

                var data = this.msg.text;
                var key = '59b6ab46d379b89d794c87b74a511fbd59b6ab46d379b89d794c87b74a511fbd';
                var iv = '0aaff094b6dc29742cc98a4bac8bc8f9';

                var encrypted = CryptoJS.AES.encrypt(CryptoJS.enc.Utf8.parse(data), CryptoJS.enc.Hex.parse(key), { iv: CryptoJS.enc.Hex.parse(iv) });

                //this.msg.text = encrypted.ciphertext;
                console.log('Ciphertext: [' + encrypted.ciphertext + ']');

                var cipherParams = CryptoJS.lib.CipherParams.create({ciphertext: CryptoJS.enc.Hex.parse(encrypted.ciphertext.toString())});
                var decrypted = CryptoJS.AES.decrypt(cipherParams, CryptoJS.enc.Hex.parse(key), { iv: CryptoJS.enc.Hex.parse(iv) });

                console.log( 'Cleartext:  [' + decrypted.toString(CryptoJS.enc.Utf8) + ']');


            }
        },
        mounted() {
            this.getData();
        },

    }
</script>
