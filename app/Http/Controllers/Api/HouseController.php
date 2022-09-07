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
        //variable for return houses
        $houses = [];

        //get data pass through axios.post
        $data = $request->all();
        //get long and lat
        $coordinates = $data['coordinates'];
        $lon = $coordinates['lon'];
        $lat = $coordinates['lat'];
        // /get long and lat

        //get services
        $servicesId = $data['services'];
        // /get services

        $radius = $data['distance'];
        $rooms = $data['rooms'];
        $beds = $data['beds'];

        //get all houses from database
        $allHouses = House::all();
        
        
        foreach ($allHouses as $house) {
            if (empty($servicesId)){
                $distance = $this->distance($lat, $lon, $house->latitude, $house->longitude);

                if ($distance <= $radius && $house->number_rooms >= $rooms && $house->number_beds >= $beds) {
                    $houses[] = $house;
                }
            } else {
                if (!array_diff($servicesId, $house->services()->service_id)) {

                    $distance = $this->distance($lat, $lon, $house->latitude, $house->longitude);
    
                    if ($distance <= $radius && $house->number_rooms >= $rooms && $house->number_beds >= $beds) {
                        $houses[] = $house;
                    }
                }
            }
            

            
        } 
        return $houses;            
    }

    public function houseDetails($id) {
        $house = House::where('id', $id)->first();
        return $house;
    }
}
