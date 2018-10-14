<?php

namespace App\Http\Controllers;

use App\Character;
use App\Guild;
use App\User;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    /**
     * Create Character
     */
    public function create(Request $request){
        $request->validate([
            'username' => 'required|string',
            'characterName' => 'required|string',
            'class' => 'required|string',
            'race' => 'required|string',
            'server' => 'required|string',
            'faction' => 'required|boolean',
            'lvl' => 'required|integer',
            'zone' => 'required|string',
            'guildName' => 'string'
        ]);

        $user = User::where('username', $request['username'])->first();
        $guild = Guild::where('guild_name', $request['guildName'])->first();

        $character = new Character;
        $character->character_name = $request['characteName'];
        $character->class = $request['class'];
        $character->race = $request['race'];
        $character->server = $request['server'];
        $character->lvl = $request['lvl'];
        $character->zone = $request['zone'];
        if($request['faction'] == 1){
            $character->faction = "Horde";
        }
        else{
            $character->faction = "Alliance";
        }

        $user = $user->characters()->save($character);
        $guild = $guild->characters()->save($character);

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
