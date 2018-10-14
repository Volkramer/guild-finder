<?php

namespace App\Http\Controllers;

use App\Guild;
use App\User;
use Illuminate\Http\Request;

class GuildController extends Controller
{
    /**
     * Create guild
     */
    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'server' => 'required|string',
            'faction' => 'required|boolean',
            'guildName' => 'string'
        ]);

        $user = User::where('username', $request->username)->first();

        $guild = new Guild;
        $guild->guild_name = $request['guildName'];
        $guild->server = $request['server'];
        if($request['faction'] == 1){
            $guild->faction = "Horde";
        }
        else{
            $guild->faction = "Alliance";
        }

        $guild->users()->save($guild);
        $user->guilds()->save($user);

        return response()->json([
            'message' => 'Guild created'
        ]);
    }
}
