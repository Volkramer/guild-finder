<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    public function characters(){
        return $this->hasMany('App\Character');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
