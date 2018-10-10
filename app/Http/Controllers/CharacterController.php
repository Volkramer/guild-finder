<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * @param
     * Create Character
     */
    public function create(Request $request){
        $request->validate([
            'character_name' => 'required|string',
            'class' => 'required|string',
            'race' => 'required|string',
            'server' => 'required|string',
            'faction' => 'required|boolean',
            'lvl' => 'required|integer'
        ]);

        $character = new Character;
        $character->character_name = $request['character_name'];
        $character->class = $request['class'];
        $character->race = $request['race'];
        $character->server = $request['server'];
        $character->lvl = $request['lvl'];
        if($request['faction'] == 1){
            $character->faction = "horde";
        }
        else{
            $character->faction = "alliance";
        }
        $character->save();

        return response()->json([
            'message' => 'Character created'
        ]);
    }
}
