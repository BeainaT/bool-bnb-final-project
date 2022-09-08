<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\House;
use App\Service;

class HouseController extends Controller
{
    public function index() {
        $houses = House::all();
        return $houses;
    }

    public function show(Request $request) {
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

        //get other data for query
        $radius = $data['distance'];
        $rooms = $data['rooms'];
        $beds = $data['beds'];
        // /get other data for query



        //calculate max and min coordinates for radius filter
        $minlat = $lat - ($radius/111.12);
        $maxlat = $lat + ($radius/111.12);
        $minlon = $lon - ($radius/111.12);
        $maxlon = $lon + ($radius/111.12);
        // /calculate max and min coordinates for radius filter

        //get all houses from database with contains those filters activated
        if ($servicesId == []) {
            $houses = House::where('number_rooms', '>=', $rooms)
                ->where('number_beds', '>=', $beds)
                ->where('longitude', '<=', $maxlon)
                ->where('longitude', '>=', $minlon)
                ->where('latitude', '<=', $maxlat)
                ->where('latitude', '>=', $minlat)
                ->get();

                if ($houses == []) {
                    return $houses = false;
                }
        } else {
            $allHouses = House::where('number_rooms', '>=', $rooms)
                ->where('number_beds', '>=', $beds)
                ->where('longitude', '<=', $maxlon)
                ->where('longitude', '>=', $minlon)
                ->where('latitude', '<=', $maxlat)
                ->where('latitude', '>=', $minlat)
                ->get();

            if ($allHouses == []) {
                return $houses = false;
            }

            $flag = 0;
            foreach ($allHouses as $house) {
                foreach ($servicesId as $service) {
                    $exist = $house->services->contains($service);
                    if ($exist) {
                        $flag += 1;
                    } else {
                        $flag -= 1;
                    }
                }
                if ($flag == count($servicesId)) {
                    $houses[] = $house;  
                }
                $flag = 0;
            }


            if ($houses == []) {
                return $houses = false;
            }
        }   
        // /get all houses from database with contains those filters activated
        

        return $houses;            
    }

    public function houseDetails($id) {
        $house = House::where('id', $id)->first();
        return $house;
    }
}
