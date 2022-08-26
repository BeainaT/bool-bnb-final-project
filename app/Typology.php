<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    public function houses(){
        return $this->belongsToMany('App\House');
    }
}
