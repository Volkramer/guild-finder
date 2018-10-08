<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBlizzardController extends Controller
{
    private $key = 'gxtshdctm8csfwd3yaybyddexb2yy59d';

    /**
     * function to call server from the Api Blizzard
     */
    public function getServer(Request $request)
    {
        $opts = array('http'=>array('method'=>"GET"));

        $context = stream_context_create($opts);

        $server = file_get_contents('https://'.$request->zone.'.api.battle.net/wow/realm/status?locale=en_US&apikey='.$this->key, false, $context);
        return $server;
    }

}
