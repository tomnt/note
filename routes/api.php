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

Route::post('note/create/','NotesController@create');
Route::get('note/read/','NotesController@read');
Route::get('note/read/{id?}/','NotesController@readId');
Route::put('note/update/{id?}/','NotesController@update');
Route::delete('note/delete/{id?}/','NotesController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
