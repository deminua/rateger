<script>
    window.onload = function(){
        // создать подключение
    //var socket = new WebSocket("ws://localhost:8081");
    var socket = new WebSocket("ws://designer1:8081/xxxtestxxx");

    // отправить сообщение из формы publish
    document.forms.publish.onsubmit = function() {
        var outgoingMessage = this.message.value;
        this.message.value = '';
        socket.send(outgoingMessage);
        return false;
    };

    // обработчик входящих сообщений
    socket.onmessage = function(event) {
        var incomingMessage = event.data;
        showMessage(incomingMessage);
    };

    // показать сообщение в div#subscribe
    function showMessage(message) {
        var messageElem = document.createElement('div');
        messageElem.appendChild(document.createTextNode(message));
        document.getElementById('subscribe').appendChild(messageElem);
    }

    };
</script>


<!-- форма для отправки сообщений -->
<form name="publish">
    <input type="text" name="message">
    <input type="submit" value="Отправить">
</form>

<!-- здесь будут появляться входящие сообщения -->
<div id="subscribe"></div>