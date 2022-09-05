<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;

class HouseController extends Controller
{
    public function index() {
        $houses = House::all();
        return $houses;
    }

    public function show(Request $request) {
        return $request;
    }

    public function showThen(Request $request) {
        $data = $request->all();
        dd($data);
    }
}
