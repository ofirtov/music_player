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

Route::get('/', function () {
    return view('home');
});

//Routing to MusicController index() method
Route::get('player', 'MusicController@index')->name('player');

// For uploading new dong to DB and storage
Route::post('player', 'MusicController@store');
// For selected song to play
Route::get('now_playing/{id?}/{name?}', 'MusicController@now_playing')->name('now_playing');
// Show all songs
Route::get('all_songs', 'MusicController@all_songs');

// For 404 pages
Route::fallback(function () {
   return view('player');
});

//Routing to MusicController homepage() method
Route::get('home', 'MusicController@homepage');

//Routing to MusicController aboutpage() method
Route::get('about', 'MusicController@aboutpage');

// For selected song to play
//Route::get('player/{id?}/{name?}', 'MusicController@now_playing')->name('selected');




