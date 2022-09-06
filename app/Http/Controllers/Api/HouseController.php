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
        $data = $request->all();
        foreach($data as $item) {
            foreach($item as $coordinate) {
                $lon = $coordinate['lon'];
                $lat = $coordinate['lat'];
            }
        }
        $houses = House::where('latitude', $lat)->where('longitude', $lon)->get();
        return $houses;                
    }

    // public function showThen(Request $request, $coordinate) {
    //     $coordinate = $request->all();
    //     return $coordinate;
    // }
}
