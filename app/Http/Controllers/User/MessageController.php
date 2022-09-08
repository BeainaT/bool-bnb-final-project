<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Message;

class MessageController extends Controller
{
    public function index() {
        $user_id = Auth::id();

        $messages = Message::whereHas('house', function($q) use($user_id) {
            $q->where('user_id', $user_id);
        })->orderBy('id', 'DESC')->get();

        return view('user.messages.index', compact('messages'));
    }
    public function destroy(Message $message) {

        $message->delete();
        return redirect()->route('user.messages.index');
    }
}
