<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $guarded = ['services'];

    protected $fillable = ['number_rooms', 'number_beds', 'number_bathrooms', 'square_meters', 'description', 'price', 'typology_id'];

    // Many to one 
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function typology(){
        return $this->belongsTo('App\Typology');
    }
    // One to many 
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function view_ratings(){
        return $this->hasMany('App\View_rating');
    }
    // Many to Many
    public function services(){
        return $this->belongsToMany('App\Service');
    }
    public function promotes(){
        return $this->belongsToMany('App\Promote');
    }
}
