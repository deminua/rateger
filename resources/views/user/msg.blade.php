<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <script>
        window.onload = function(){
            // создать подключение
            //var socket = new WebSocket("ws://localhost:8081");


            var socket = new WebSocket("ws://176.100.166.193:8081?group={{ md5('123') }}&token=123&id={{ $id }}");

            // отправить сообщение из формы publish
            document.forms.publish.onsubmit = function() {
                //var outgoingMessage = this.message.value;
                //var outgoingMessage = ['key123', this.message.value];
                var data = {
                    user_id: "1",
                    token: "777",
                    message: this.message.value
                };
                var outgoingMessage = JSON.stringify(data);
                this.message.value = '';

                //var step;
                //for (step = 0; step < 50000; step++) {
                //    var now = new Date();
                //    socket.send(now);
                //}

                socket.send(outgoingMessage);
                return false;
            };

            /*
             socket.onopen = function(m) {
             var data = {
             user_id: "1",
             token: "777",
             message: "Текст текст ...."
             };
             var outgoingMessage = JSON.stringify(data);
             socket.send(outgoingMessage);
             }
             */

            // обработчик входящих сообщений
            socket.onmessage = function(event) {
                var incomingMessage = event.data;
                showMessage(incomingMessage);
            };


            /*        var data = {
             user_id: "1",
             token: "777",
             date: "Инициализация ..."
             };
             var outgoingMessage = JSON.stringify(data);
             socket.send(outgoingMessage);*/

            // показать сообщение в div#subscribe
            function showMessage(message) {
                var messageElem = document.createElement('div');
                messageElem.appendChild(document.createTextNode(message));
                document.getElementById('subscribe').appendChild(messageElem);
            }

        };


        /*
         //tests JS
         var clients = {};
         var rooms = {};

         var roomId = 123;
         rooms[roomId] = clients;

         var id1 = Math.round((Math.random() * 1000000));
         var id2 = Math.round((Math.random() * 1000000));
         var id3 = Math.round((Math.random() * 1000000));
         clients[id1] = 'w1s';
         clients[id2] = 'w2s';
         clients[id3] = 'w3s';
         rooms[roomId][id2] = 'w222s';
         //rooms[roomId] = clients;
         console.log(rooms);
         */

        //var obj[roomId].push('value2');

        //var rooms[123] = clients[id];
        //obj[roomId].push('value1');

        //rooms[roomId].push(id);



    </script>

</head>
<body>
<div id="app">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 user">





<!-- форма для отправки сообщений -->
<form name="publish" class="form-inline">
    <div class="form-group">
    <input class="form-control" type="text" name="message" placeholder="message...">
    <input type="submit" class="btn btn-default" value="Отправить">
    </div>
</form>

<!-- здесь будут появляться входящие сообщения -->
<div class="form-group" id="subscribe"></div>



            </div>
        </div>
    </div>



</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
