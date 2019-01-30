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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

/******************** RUTAS DE RESOURSE ********************************************/
Route::resource('collections', 'Collection\CollectionController', ['except' => ['create','edit']]);
Route::resource('sub-collections', 'SubCollection\SubConllectionController', ['except' => ['create','edit']]);
Route::resource('communities', 'Community\CommunityController', ['except' => ['create','edit']]);
Route::resource('objects', 'ObjectMuseum\ObjectController', ['except' => ['create','edit']]);
Route::resource('sets', 'Set\SetController', ['except' => ['create','edit']]);
Route::resource('community', 'Community\CommunityController', ['except' => ['create','edit']]);
