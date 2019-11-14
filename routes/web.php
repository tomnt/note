<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('note/create/','NotesController@create');//TODO: remove (For testing)
Route::post('note/create/','NotesController@create');

Route::get('note/read/','NotesController@read');


Route::get('note/read/{id?}/','NotesController@readId');

Route::get('note/update/{id?}/','NotesController@update');//TODO: remove (For testing)
Route::put('note/update/{id?}/','NotesController@update');

Route::delete('note/delete/{id?}/','NotesController@delete');
Route::get('note/delete/{id?}/','NotesController@delete');//TODO: remove (For testing)

Route::get('/', function () {
    return view('welcome');
});
