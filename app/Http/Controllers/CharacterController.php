<?php

namespace App\Http\Controllers;

use App\Character;
use App\User;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
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

        $user = User::where('username', $request->username)->first();

        $character = new Character;
        $character->character_name = $request['character_name'];
        $character->class = $request['class'];
        $character->race = $request['race'];
        $character->server = $request['server'];
        $character->lvl = $request['lvl'];
        if($request['faction'] == 1){
            $character->faction = "Horde";
        }
        else{
            $character->faction = "Alliance";
        }
        $user->characters()->save($character);

        return response()->json([
            'message' => 'Character created'
        ]);
    }

    /**
     * Read Character
     */
    public function read(Request $request){
        $user = User::where('username', $request->username)->first();
        return $user->characters;
    }
}
