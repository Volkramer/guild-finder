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

        $character = new Character([
            'character_name' => $request->character_name,
            'class' => $request->class,
            'race' => $request->race,
            'server' => $request->server,
            'faction' => $request->faction,
            'lvl' => $request->lvl
        ]);

        $character->save();

        return response()->json([
            'message' => 'Character created'
        ]);
    }
}
