<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function store(Request $request, $house_id) {
        $data = $request->all();
        $newMessage = new Message();
        $newMessage->house_id = $house_id;
        $newMessage->sender_name = $data['name'];
        $newMessage->sender_email = $data['email'];
        $newMessage->text = $data['message'];
        $newMessage->save();

        return $newMessage;
    }
}
