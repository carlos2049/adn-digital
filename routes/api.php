<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('perritos', 'PerritoController@getDogs');
Route::post('perritos', 'PerritoController@createDog');
Route::put('perritos/{id}', 'PerritoController@updateDog');
Route::delete('perritos/{id}', 'PerritoController@deleteDog');

// Route::apiResource('/perritos', 'PerritoCOntroller');
