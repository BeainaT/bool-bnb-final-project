<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promote extends Model
{
    public function houses(){
        return $this->belongsToMany('App\House', 'promote_house')->withPivot('expire_date');
    }
}
