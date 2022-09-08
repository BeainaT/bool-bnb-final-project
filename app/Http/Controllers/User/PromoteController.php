<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promote;

class PromoteController extends Controller
{
    public function index(Promote $promotes) {
        $promotes = Promote::all();

        return view('user.promotes.index', compact('promotes'));
    }
}
