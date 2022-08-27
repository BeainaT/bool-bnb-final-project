<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\House;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $houses = House::all();
        $user = Auth::user();
        $houses = $user->houses;

        return view('user.houses.index', compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.houses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $data = $request->all();
        $newHouse = new House();
        $newHouse->fill($data);
        $newHouse->address = $data['address'];

        //-- TomTom API call to save latitude and longitude on DB, from address input
        $url = 'https://api.tomtom.com/search/2/geocode/'.$newHouse->address.'.json?storeResult=false&view=Unified&key='.$this->getAPIkey();
        $obj = $this->getAddressJson($url);
        $myAddressArr = $obj->results[0]->position;
        $newHouse->latitude = $myAddressArr->lat;
        $newHouse->longitude = $myAddressArr->lon;
        //--
        $newHouse->user_id = Auth::id();
        $newHouse->image = Storage::put('uploads', $data['image']);
        $newHouse->is_visible = isset($data['is_visible']);

        $newHouse->save();

        return redirect()->route('user.houses.show', $newHouse->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        ($house->user_id == Auth::id())?: abort(403);
        return view('user.houses.show', compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house)
    {
        ($house->user_id == Auth::id())?: abort(403);
        return view('user.houses.edit', compact('house'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, House $house)
    {
        ($house->user_id == Auth::id())?: abort(403);

        $data = $request->all();
        $house->fill($data);
        if(isset($data['image'])) {
            if($house->image) {
                Storage::delete($house->image);
            }
            $house->image = Storage::put('uploads', $data['image']);
        }
        $house->address = $data['address'];
        $url = 'https://api.tomtom.com/search/2/geocode/'.$house->address.'.json?storeResult=false&view=Unified&key='.$this->getAPIkey();
        $obj = $this->getAddressJson($url);
        $myAddressArr = $obj->results[0]->position;
        $house->latitude = $myAddressArr->lat;
        $house->longitude = $myAddressArr->lon;

        $house->is_visible = isset($data['is_visible']);

        $house->save();

        return redirect()->route('user.houses.show', compact('house'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(House $house)
    {
        ($house->user_id == Auth::id())?: abort(403);
        $house->image = Storage::delete($house->image);
        $house->delete();
        return redirect()->route('user.houses.index');
    }

    private function getAPIkey() {
        return $myAPIkey = 'oHGOEFAGV4iX7o3LHt7UGHGyvzr9hH1N';
    }

    //this function makes readible url to get content and returns json
    private function getAddressJson($url) {
        $newUrl = str_replace(' ', '%20', $url);
        $json = file_get_contents($newUrl);
        return json_decode($json);
    }
}
