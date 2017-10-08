<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <div  style="width: 95vw; height: 90vh; overflow-y: scroll; border: 1px solid">
             <ul id="message" style=" list-style-type: none;">
            @foreach($messages as $message)
                    <li>{{$message->time}} {{$message->user}}: {{$message->message}} </li>
                @endforeach
             </ul>
            </div>
            <br>
            <form action="" id="newChatMessage">
                {{csrf_field()}}
            <input name="userName" id="userName" type="text" style="width: 10%" placeholder="input your name" required/>
            <input name="messageText" id="messageText" type="text" style="width: 80%" placeholder="input your message" required />
            <button type="submit">Send</button>
            </form>
        </div>
    <footer>
        <script src="/js/app.js"></script>
        <script src="/js/socketIoClient.js"></script>
    </footer>
    </body>
</html>
