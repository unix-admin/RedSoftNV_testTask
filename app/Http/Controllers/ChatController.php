<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Redis;

class ChatController extends Controller
{

    /**
     * Chat index page action, returns rendered index page without old messages
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        return view('chat.index',['messages'=>[]]);
    }

    /**
     * Chat index page action, returns rendered index page with old messages
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHistory(){
        $redis = Redis::connection();
        $messagesArrayJson = $redis->get('messages');
        if ($messagesArrayJson){
            $messagesArray = json_decode($messagesArrayJson);
        }
        else{
            $messagesArray = [];
        }
        return view('chat.index',['messages'=>$messagesArray]);
    }

    /**
     * Validate chat message from request, save it to Redis database and broadcast Redis event
     * @param Request $request
     * @return string
     */
    public function sendMessage(Request $request){

        $redis = Redis::connection();
        Validator::make($request->all(), [
            'userName' => 'required|max:255',
            'messageText' => 'required|max:255',
        ])->validate();
        $messagesArrayJson = $redis->get('messages');
        if ($messagesArrayJson){
            $messagesArray = json_decode($messagesArrayJson);
        }
        else{
            $messagesArray = [];

        }
        $chatMessage = ['time'=>date('d-m-Y H:i:s'), 'user'=>$request->input('userName'),'message'=>$request->input('messageText')];
        array_push($messagesArray,$chatMessage);
        $redis->set('messages',json_encode($messagesArray));
        $redis->publish('message', json_encode($chatMessage));
        return 'success';
    }



}
