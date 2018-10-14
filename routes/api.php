<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Route for authentification
 */

Route::group([
    'prefix' => 'auth'
], function() {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::get('signup/activate/{token}', 'AuthController@signupActivate');

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

/**
 * Route for reset password
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'password'
], function () {
    Route::post('create', 'PasswordResetController@create');
    Route::get('find/{token}', 'PasswordResetController@find');
    Route::post('reset', 'PasswordResetController@reset');
});

/**
 * Route for api blizzard
 */

Route::group([
    'prefix' => 'apiblizzard'
], function () {
    Route::post('getserver', 'ApiBlizzardController@getServer');
    Route::post('getcharacter', 'ApiBlizzardController@getCharacter');
    Route::post('getguild', 'ApiBlizzardController@getGuild');
});

/**
 * Route for Character
 */

Route::group([
    'prefix' => 'character'
], function(){
    Route::post('create', 'CharacterController@create');
    Route::post('read', 'CharacterController@read');
});

/**
 * Route for Guild
 */
Route::group([
    'prefix' => 'guild'
], function (){
    Route::post('create', 'GuildController@create');
});