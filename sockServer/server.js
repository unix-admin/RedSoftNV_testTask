/**
 * Created by Adm on 08.10.2017.
 *
 * This js script starts socket.io server on port 3000
 * Create Redis connection
 * Subscribe Redis to "message" event
 * If message received - emit this message to newChatMessage channel
 */
var io = require('socket.io')(3000);
var Redis = require('ioredis');
io.on('connection', function (socket) {

    var redisClient = new Redis(6379, '127.0.0.1');
    redisClient.subscribe('message');
    redisClient.on("message", function(channel, data) {
        socket.emit('newChatMessage',data);
    });
    socket.on('disconnect', function() {
        redisClient.quit();
    });
});