<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Message;
use App\House;

class MessageController extends Controller
{
    public function index($id) {

        $messages = Message::whereHas('house', function($query){
            $query->where('user_id', auth()->user()->id);
         })->where('house_id', $id)->orderBy('id', 'DESC')->get();

        return view('user.messages.index', compact('messages'));
    }
    public function destroy(Message $message) {

        $message->delete();
        return redirect()->route('user.messages.index');
    }
}
