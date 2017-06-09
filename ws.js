const express = require('express');
const http = require('http');
const url = require('url');
const WebSocket = require('ws');

const app = express();

var clients = {};
var rooms = {};

app.use(function (req, res) {
    res.send({ msg: "hello" });
});

const server = http.createServer(app);
const wss = new WebSocket.Server({ server });




wss.on('connection', function connection(ws, req) {
    const location = url.parse(req.url, true);

    /*
    if(location.query.token != '123') {
        req.reject();
        return false;
    }
    */
    //console.log(location.query.token);
    //console.log("==============");
    //console.log(req.url);
    //console.log("==============");
    //console.log(req.headers.sec-websocket-key);
    //console.log("==============");
    // You might use location.query.access_token to authenticate or share sessions
    // or req.headers.cookie (see http://stackoverflow.com/a/16395220/151312)

    var roomId = location.query.group;
    var id = Math.round((Math.random() * 1000000));
    //rooms[roomId] = clients;
    //rooms[roomId] = {}

        //clients[id] = ws;
    //rooms[roomId][id] = {};
    //clients[id] = ws;
    user = {};
    user[id] = ws;

    if(Object.is(rooms[roomId])) {
        rooms[roomId] = {};
    }

    rooms[roomId][id] = user[id];
    //console.log(rooms);

    //var roomId = location.query.id;
    //rooms[roomId] = clients[id];
    //console.log(ws.url);
    //console.log("roomId " + roomId);
    //console.log("rooms " + rooms);
    //console.log("новое соединение " + id);

    //rooms[roomId].push(clients[id]);
    //onsole.log(rooms.length);
    /*
    for (var room in rooms[roomId]) {
        console.log(room);
    }
    */
    //console.log(ws.upgradeReq);

    ws.on('message', function(message) {
        //console.log('получено сообщение ' + message);
        //console.log(rooms);
        for (var cl in rooms[roomId]) {
            //cl.send(message);
            rooms[roomId][cl].send(message);
            //cl[key].send(message);
        }
        //for (var cl in rooms[roomId]) {

            //console.log(cl);
            //clients[cl].send(message);

        // for (var key in cl) {
        //     //clients[key].send(JSON.stringify(ws));
        //     cl[key].send(message);
        // }
        //}



    });

    ws.on('close', function() {
        console.log('соединение закрыто ' + id);
        delete rooms[roomId][id];
        //delete clients[id];
    });

    /*
    ws.on('message', function incoming(message) {
        console.log('received: %s', message);
    });

    ws.send('something');
    */
});

server.listen(8081, function listening() {
    console.log('Listening on %d', server.address().port);
});

/*

function originIsAllowed(origin) {
    // put logic here to detect whether the specified origin is allowed.
    return false;
}

wss.on('request', function(request) {
    if (!originIsAllowed(request.origin)) {
        // Make sure we only accept requests from an allowed origin
        request.reject();
        console.log((new Date()) + ' Connection from origin ' + request.origin + ' rejected.');
        return;
    }

    var connection = request.accept('echo-protocol', request.origin);
    console.log((new Date()) + ' Connection accepted.');
    connection.on('message', function(message) {
        if (message.type === 'utf8') {
            console.log('Received Message: ' + message.utf8Data);
            connection.sendUTF(message.utf8Data);
        }
        else if (message.type === 'binary') {
            console.log('Received Binary Message of ' + message.binaryData.length + ' bytes');
            connection.sendBytes(message.binaryData);
        }
    });
    connection.on('close', function(reasonCode, description) {
        console.log((new Date()) + ' Peer ' + connection.remoteAddress + ' disconnected.');
    });
});
*/


/*
function findClientsSocket(io,roomId, namespace) {
    var res = [],
        ns = io.of(namespace ||"/");    // the default namespace is "/"

    if (ns) {
        for (var id in ns.connected) {
            if(roomId) {
                var index = ns.connected[id].rooms.indexOf(roomId) ;
                if(index !== -1) {
                    res.push(ns.connected[id]);
                }
            }
            else {
                res.push(ns.connected[id]);
            }
        }
    }
    return res;
}
*/

/*
 var WebSocketServer = new require('ws');

// подключенные клиенты
var clients = {};

// WebSocket-сервер на порту 8081
var webSocketServer = new WebSocketServer.Server({
    port: 8081
});
webSocketServer.on('connection', function(ws) {


    //console.log(ws);
    //var id = parseInt(ws.upgradeReq.url.substr(1), 10);

    var id = Math.random();
    clients[id] = ws;
    //console.log(ws.url);
    console.log("новое соединение " + id);

    console.log(ws.id);
    //console.log(ws.upgradeReq);


    ws.on('message', function(message) {
        console.log('получено сообщение ' + message);

        for (var key in clients) {
            //clients[key].send(JSON.stringify(ws));
            clients[key].send(message);
        }
    });

    ws.on('close', function() {
        console.log('соединение закрыто ' + id);
        delete clients[id];
    });

});

    */