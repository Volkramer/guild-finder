<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    /**
     *  Get the User that owns the Characters
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function guild()
    {
        return $this->belongsTo('App\Guild');
    }
}
