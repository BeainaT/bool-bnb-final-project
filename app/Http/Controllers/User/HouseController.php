<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\House;
use App\User;
use App\Service;
use App\Typology;

class HouseController extends Controller
{
    private $validation = [
        'name' => 'required|string|max:100|unique:houses',
        'user_id' => 'exists:users,id',
        'typology_id' => 'nullable|exists:typologies,id',
        'number_rooms' => 'required|integer|between:1,255',
        'number_beds' => 'required|integer|between:1,255',
        'number_bathrooms' => 'required|integer|between:1,255',
        'square_meters' => 'required|integer|between:1,32767',
        'address' => 'required|string|min:2|max:100',
        'image' => 'required|mimes:jpg,png,bmp,jpeg|max:1024',
        'description' => 'nullable|string|max:65535',
        'price' => 'nullable|numeric|between:0.00,9999.99',
        'is_visible' => 'accepted|sometimes',
        'latitude' => 'numeric|between:-90.000000,90.000000',
        'longitude' => 'numeric|between:-180.000000,180.000000',
        'services' => 'required|exists:services,id',
        // 'typologies' => 'exists:typologies,id|nullable'
    ];   
    
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
        $services = Service::all();
        $typologies = Typology::all();
        return view('user.houses.create', compact('services', 'typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation);

        $newHouse = new House();
        $newHouse->fill($data);
        $newHouse->name = $data['name'];
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

         //add typology id into house table
        if(($request->input('typologies')) != '') {
            $newHouse->typology_id = $request->input('typologies');
        } else {
            $newHouse->typology_id = null;
        }

        $newHouse->save();

        //add services to pivot table house_service
        if(isset($data['services'])) {
            $newHouse->services()->attach($data['services']);
        }

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

        if($house->user_id !== Auth::id()) {
            abort(403);
        }
        //get the typology connected to the house
        $typology = Typology::where('id', $house->typology_id)->first();

        //get services connected to the house
        $services = $house->services()->get();
    


        return view('user.houses.show', compact('house', 'typology', 'services'));
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

        $services = Service::all();
        $typologies = Typology::all();

        $houseServices = $house->services->map(function ($service) {
            return $service->id;
        })->toArray();

        return view('user.houses.edit', compact('house', 'services', 'typologies', 'houseServices'));
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
        //this allows the user to keep the same house's name on house update even if value must be unique
        $this->validation['name'] = $this->validation['name'].',user_id,';
        $this->validation['image'] = 'nullable|mimes:jpg,png,bmp,jpeg|max:1024';
        $data = $request->validate($this->validation);

        $house->fill($data);
        $house->name = $data['name'];
        //replace required img stored in uploads folder at store method, with new img uploaded in update method
        if(isset($data['image'])) {
            if($house->image) {
                Storage::delete($house->image);
            }
            $house->image = Storage::put('uploads', $data['image']);
        }
        //--
        $house->address = $data['address'];
        //-- TomTom API call to save latitude and longitude on DB, from updated address input
        $url = 'https://api.tomtom.com/search/2/geocode/'.$house->address.'.json?storeResult=false&view=Unified&key='.$this->getAPIkey();
        $obj = $this->getAddressJson($url);
        $myAddressArr = $obj->results[0]->position;
        $house->latitude = $myAddressArr->lat;
        $house->longitude = $myAddressArr->lon;
        //--
        $house->is_visible = isset($data['is_visible']);

        //update typology id into house table
        if(($request->input('typologies')) != '') {
            $house->typology_id = $request->input('typologies');
        } else {
            $house->typology_id = null;
        }

        $house->save();

        //update services
        $services = isset($data['services']) ? $data['services'] : [];

        $house->services()->sync($services);

        //update typology


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
