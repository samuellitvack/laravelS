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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(['middleware' => 'auth'], function() {
	Route::resource('personas', 'PersonaController');
	Route::delete('personas/{id}', 'PersonaController@destroy');
});

Route::resource('personapublico', 'PersonaPublicoController');

Auth::routes();

Route::get('/', 'HomeController@index');