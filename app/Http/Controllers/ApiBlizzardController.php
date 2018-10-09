<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBlizzardController extends Controller
{
    private $key = 'gxtshdctm8csfwd3yaybyddexb2yy59d';

    /**
     * Function to fetch server from the api Blizzard
     *
     * @param Request $request
     * @return bool|string
     */
    public function getServer(Request $request)
    {
        $opts = array('http'=>array('method'=>"GET"));

        $context = stream_context_create($opts);

        $server = file_get_contents('https://'.$request->zone.'.api.battle.net/wow/realm/status?locale=en_US&apikey='.$this->key, false, $context);
        return $server;
    }

    /**
     * Function to fetch character from the api Blizzard
     *
     * @param Request $request
     * @param zone
     * @param characterName
     * @param serverName
     * @return bool|string
     */

    public function getCharacter(Request $request)
    {
        $opts = array('http'=>array('method'=>"GET"));

        $context = stream_context_create($opts);

        $character = file_get_contents('https://'.$request->zone.'.api.battle.net/wow/character/'.$request->serverName.'/'.$request->characterName.'?locale=en_US&apikey='.$this->key, false, $context);
        $races = file_get_contents('https://eu.api.battle.net/wow/data/character/races?locale=en_GB&apikey='.$this->key, false, $context);
        $classes = file_get_contents('https://eu.api.battle.net/wow/data/character/classes?locale=en_GB&apikey='.$this->key, false, $context);
        $races=json_decode($races, true);
        $classes=json_decode($classes, true);
        $character=json_decode($character, true);
        foreach($races["races"] as $race){
            if($race["id"]==$character["race"]){
                $character["race"]=$race["name"];
            }
        }
        foreach($classes["classes"] as $classe){
            if($classe["id"]==$character["class"]){
                $character["class"]=$classe["name"];
            }
        }
        $character=json_encode($character);
        return $character;
    }

}
