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

        //props: ['testList'],

/*
        props: {
            // простая проверка типа (`null` означает допустимость любого типа)
            propA: null,
            // несколько допустимых типов
            content: [String, Number],
            propC: Number,
        },
        */
/*        props: {
            yearMessage: [String, Number],
            monthMessage: [String, Number],
        },*/

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

/*        data(){
            return {
                messages: [
                    { text: 'Посадить дерево' },
                    { text: 'Построить дом' },
                    { text: 'Вырастить сына' }
                ],
                testList: 'list data',
            }
        },*/

/*
        methods: {
            getData: function (data) {
                this.messages = data;
                console.log(data);
                //this.dataProp = 'data1';
                //return this.dataProp = 'data1';
            }
        },
*/

/*        mounted() {

                this.getData('textvar текст 123');
            //this.getData('p2','p2','monthMessage');
            //console.log(this)
        },*/
        components: {
            Rcrypt
        }

        /*
        data(){
            return {
                //datacrypt2: this.$parent.propB,
                //datacrypt2: this.propB,
                editForm: {
                    name: '',
                    email: ''
                },
                editPencil: 'glyphicon glyphicon-pencil',
                content2: this.content,

            }
        },
        */


        /*
        data(){
            return {
                test1: this.products,
                editForm: {
                    name: '',
                    email: ''
                },
                editPencil: 'glyphicon glyphicon-pencil',
                show: false,

            }
        },
*/

//        mounted() {
//            console.log(this)
//        }
    }
</script>
