/**
 * Created by Adm on 08.10.2017.
 *
 * This js script subscribe to channel "newChatMessage" and if meggage received update message view
 */
const socket = io('http://192.168.10.10:3000');
socket.on('newChatMessage',function (data) {
    var messageObject = JSON.parse(data)
    $('#message').append('<li>'+messageObject.time+' '+messageObject.user+' '+messageObject.message)
})