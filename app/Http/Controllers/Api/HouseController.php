<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;

class HouseController extends Controller
{
    public function distance($latitude1, $longitude1, $latitude2, $longitude2) {
        $theta = $longitude1 - $longitude2; 
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
        $distance = acos($distance); 
        $distance = rad2deg($distance); 
        $distance = $distance * 60 * 1.1515; 
        $distance = $distance * 1.609344; 
        return (round($distance,2)); 
    }

    public function index() {
        $houses = House::all();
        return $houses;
    }

    public function show(Request $request) {
        $houses = [];
        $radius = 20;

        //get first data request
        $data = $request->all();
        foreach($data as $coordinate) {
            $lon = $coordinate['lon'];
            $lat = $coordinate['lat'];
        }
        
        $allHouses = House::all();

        foreach ($allHouses as $house) {

            $distance = $this->distance($lat, $lon, $house->latitude, $house->longitude);
            
            if ($distance <= $radius) {
                $houses[] = $house;
            }
        }
        
        return $houses;            
    }
}
