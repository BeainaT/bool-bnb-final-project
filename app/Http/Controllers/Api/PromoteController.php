<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promote;

class PromoteController extends Controller
{
    public function index() {
        $promotes = Promote::all();
        return $promotes;
    }
}
