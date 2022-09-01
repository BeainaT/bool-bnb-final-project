<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;

class HomeController extends Controller
{
    public function index() {
        $houses = House::all();
        return $houses;
    }
}
