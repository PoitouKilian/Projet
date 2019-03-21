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
    return view('accueil');
});
Route::get('/ronde', function () {
    return view('ronde');
});

Route::get('/ronde', function () {
    return view('ronde');
});

//Route::get('/ronde', 'RondesController@retourAgents');
Route::get('/ronde', 'RondesController@retourHistoriquepointeau');

Route::get('/statistique', function () {
    return view('statistique');
});
