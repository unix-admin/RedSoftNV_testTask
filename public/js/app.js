
/**
 * Created by Adm on 08.10.2017.
 *
 * This js script submit message form on server
 */
$(document).ready(function () {
    $('#newChatMessage').on('submit',function () {
        $.ajax({
            method: "POST",
            url:"/laravel/chat/addMessage",
            data: $( this ).serialize(),
            success: function () {
                $("#newChatMessage")[0].reset();
            }
        });
        return false;
    })
});