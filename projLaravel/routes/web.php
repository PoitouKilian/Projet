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

/*Affichage page Accueil*/
Route::get('/', function () {
    return view('accueil');
});
/*Affichage page Ronde*/
Route::get('/ronde', function () {    
    return view('ronde');
});
/*Affichage page Statistique*/
Route::get('/statistique', function () {
    return view('statistique');
});
/*Affichage page Statistique*/
Route::get('/authentification', function () {
    return view('authentification');
});


/*Fonctions pour l'onglet ronde*/
Route::post('ronde/submit', 'RondesController@submitRechercheRonde');

Route::get('/ronde', 'RondesController@retourMesureTableau');

/*Fonctions pour l'onglet photos*/
Route::post('ronde/rapport/photos', 'RondesController@boutonPhotos');

/*Fonctions pour l'onglet rapport*/
Route::post('ronde/rapport', 'RondesController@boutonRapport');

/*Fonctions pour l'onglet statistique*/

Route::get('/statistique', 'RondesController@retourStatsNbErreurRonde');

Route::get('/statistique', 'RondesController@retourStatsNbErreur');

Route::get('/statistique', 'RondesController@retourStatsNbRondeCorrect');

Route::get('/statistique', 'RondesController@retourStatsRondeRetard');

Route::get('/statistique', 'RondesController@retourStatsRondeAvance');

Route::get('/authentification', 'RondesController@login');