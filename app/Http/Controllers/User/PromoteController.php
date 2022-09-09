<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promote;
use App\House;

class PromoteController extends Controller
{
    public function index(House $house) {
        $promotes = Promote::all();

        return view('user.promotes.index', compact('promotes', 'house'));
    }
    
    public function show(House $house, Promote $promote) {
        // $promotes = Promote::find($promote)->get();
        return view('user.promotes.show', compact('house', 'promote'));
    }
}   
