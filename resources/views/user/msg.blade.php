<script>
    window.onload = function(){
        // создать подключение
    //var socket = new WebSocket("ws://localhost:8081");


    var socket = new WebSocket("ws://192.168.88.252:8081?token=123&id={{ $id }}");

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


<!-- форма для отправки сообщений -->
<form name="publish">
    <input type="text" name="message">
    <input type="submit" value="Отправить">
</form>

<!-- здесь будут появляться входящие сообщения -->
<div id="subscribe"></div>