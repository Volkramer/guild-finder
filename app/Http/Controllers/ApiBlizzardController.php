<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBlizzardController extends Controller
{
    private $key = 'gxtshdctm8csfwd3yaybyddexb2yy59d';
    private $opts = array('http'=>array('method'=>"GET"));

    /**
     * Function to retrieve server from the api Blizzard
     *
     * @param Request $request
     * @return json
     */
    public function getServer(Request $request)
    {
        $context = stream_context_create($this->opts);
        $server = file_get_contents('https://'.$request->zone.'.api.battle.net/data/wow/realm/?namespace=dynamic-eu&locale=en_US&access_token=636xwqehest6fn56hmc87ahf',false, $context);
//        $server = file_get_contents('https://'.$request->zone.'.api.battle.net/wow/realm/status?locale=en_US&apikey='.$this->key, false, $context);
        return $server;
    }

    /**
     * Function to retrieve character from the api Blizzard
     *
     * @param Request $request
     * @param zone
     * @param characterName
     * @param serverName
     * @return json
     */

    public function getCharacter(Request $request)
    {
        $context = stream_context_create($this->opts);
        $character = file_get_contents('https://'.$request->zone.'.api.battle.net/wow/character/'.$request->serverName.'/'.$request->characterName.'?fields=guild&locale=en_US&apikey='.$this->key, false, $context);
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
