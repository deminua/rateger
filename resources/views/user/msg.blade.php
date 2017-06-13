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


         function start(){
            // создать подключение
            var socket = new WebSocket('ws://dserver.ddns.net:8081?group={{ md5('123') }}&token=123&id={{ $id }}');

            // отправить сообщение из формы publish
            document.forms.publish.onsubmit = function() {

                var data = {
                    user_id: "1",
                    token: "777",
                    text: "Отправка из document.forms.publish.onsubmit функции",
                    message: this.message.value
                };
                var outgoingMessage = JSON.stringify(data);
                this.message.value = '';

                socket.send(outgoingMessage);
                return false;
            };


            // обработчик входящих сообщений
            socket.onmessage = function(event) {
                var incomingMessage = event.data;
                showMessage(incomingMessage);
            };

             socket.onclose = function(){
                 //try to reconnect in 5 seconds
                 setTimeout(function(){start()}, 5000);
             };

            // показать сообщение в div#subscribe
            function showMessage(message) {
                var messageElem = document.createElement('div');
                messageElem.appendChild(document.createTextNode(message));
                document.getElementById('subscribe').appendChild(messageElem);
            }

        };


         window.onload = function() {
             start();
         };



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
