<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function index(User $user) {
        $user = Auth::user();
        return view('user.dashboard', compact('user'));
    }
}
