<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat</title>
        <link rel="stylesheet" type="text/css" href="/css/app.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
        <script
                src="https://code.jquery.com/jquery-3.2.1.min.js"
                integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
                crossorigin="anonymous"></script>
    </head>
    <body>
        <div>
            <div  id="messageArea">
             <ul id="message">
            @foreach($messages as $message)
                    <li>{{$message->time}} {{$message->user}}: {{$message->message}} </li>
                @endforeach
             </ul>
            </div>
            <br>
            <form action="" id="newChatMessage">
                {{csrf_field()}}
            <input name="userName" id="userName" type="text" placeholder="input your name" required/>
            <input name="messageText" id="messageText" type="text" placeholder="input your message" required />
            <button type="submit">Send</button>
            </form>
        </div>
    <footer>
        <script src="/js/app.js"></script>
        <script src="/js/socketIoClient.js"></script>
    </footer>
    </body>
</html>
