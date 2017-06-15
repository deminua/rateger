const express = require('express');
const http = require('http');
const url = require('url');
const WebSocket = require('ws');

const app = express();

var clients = {};
var rooms = {};

/*
app.use(function (req, res) {
    res.send({ msg: "hello" });
});
*/

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

    //var api_token = null;
    var request = require("request");


    //Авторизируемся по SID
    var auth_ws ='http://dserver.ddns.net/api/auth_ws?sid='+location.query.sid+'';

    request({
        url: auth_ws,
        json: true
    }, function (error, response, data) {

        if (!error && response.statusCode === 200) {
            var api_token = data.client;

            var roomId = api_token;
            var id = Math.round((Math.random() * 1000000));

            user = {};
            user[id] = ws;

            if(Object.is(rooms[roomId])) {
                rooms[roomId] = {};
            }

            rooms[roomId][id] = user[id];

            user[id].send(JSON.stringify({'method':data.method, 'data':data.data}));

            var api_req_url ='http://dserver.ddns.net/api/v1/ws?api_token='+api_token+'';

            ws.on('message', function(message) {

                request({
                    body: JSON.parse(message),
                    url: api_req_url,
                    json: true
                }, function (error, response, body) {

                    if (!error && response.statusCode === 200) {

                        if(body.clients) {

                            for (var i in body.clients) {
                                var clients = body.clients[i];

                                for (var cl in rooms[clients]) {
                                        rooms[clients][cl].send(JSON.stringify({'method':body.method, 'data':body.data}));

                                }
                                //rooms[body.clients[i]][cl].send(JSON.stringify('ИНФА для юзеров'));
                                //console.log(rooms[roomId][cl]);
                                //console.log(cl);
                            }

                        }
                        /*
                        for (var cl in rooms[roomId]) {
                            rooms[roomId][cl].send(JSON.stringify(body));
                        }
                        */

                    }
                });

            });

            ws.on('close', function() {
                //console.log('соединение закрыто ' + id);
                delete rooms[roomId][id];
                //delete clients[id];
            });

        }
    });

//var roomId = location.query.sid;
//var id = Math.round((Math.random() * 1000000));

//user = {};
//user[id] = ws;

//if(Object.is(rooms[roomId])) {
//    rooms[roomId] = {};
//}

//rooms[roomId][id] = user[id];





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