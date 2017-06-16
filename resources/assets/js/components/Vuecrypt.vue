<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">VueCrypt Component</div>

                    <div class="panel-body">
                        <Rcrypt
                                v-for="(msg, index) in messages"
                                :key="msg.id"
                                :msg="msg"
                                :parentMessage="parentMessage"
                                :index="index"
                        >
                        </Rcrypt>


                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>

    import Rcrypt from './Rcrypt.vue';

    export default {

        name: 'VueCrypt',

        props:["socket"],

        data(){
            return {
                parentMessage: 'Родитель',
                messages: [
                    {id:231, text: 'Посадить дерево 123'},
                    {id:422, text: 'Построить дом'},
                    {id:123, text: 'Вырастить сына'}
                ]
            }
            },

        methods: {

            testData: function (data) {

                this.messages.push({id:1, text: data});
                //console.log(data);
//                var mpush = this.messages;
//
//                this.socket.onmessage = function(event) {
//                    var incomingData = JSON.parse(event.data);
//                    mpush.push({id:1, text: incomingData});
//                }

            },

            testData2: function (data) {
                this.messages.push({id:2, text: data});
            },
            testData3: function (data) {
                this.messages.push({id:3, text: data});
            }

        },

        components: {
            Rcrypt
        },

        mounted() {

            //var mpush = this.messages;
            var gomethod = this;

            this.socket.onmessage = function(event) {
                var incomingData = JSON.parse(event.data);
               // this.testData(incomingData);
                //var namef = incomingData.method;
                gomethod[incomingData.method](incomingData.data);
            }

           //this.testData();
        }
    }
</script>
