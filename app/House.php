<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function services(){
        return $this->belongsToMany('App\Service');
    }
    public function typologies(){
        return $this->belongsToMany('App\Typology');
    }
    public function messages(){
        return $this->hasMany('App\Message');
    }
    public function view_ratings(){
        return $this->hasMany('App\View_rating');
    }
    public function promotes(){
        return $this->belongsToMany('App\Promote');
    }
}
