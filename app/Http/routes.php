<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*Route::get('/', function () {
    return view('/home');
});*/
use Illuminate\Support\Facades\Gate;

Route::get('bio/api/getRegions', 'BioController@getRegion');
/*Route::get('bio/api/getRegions', function($id) {
    dd(\App\countrie::whereRegion(1));
});*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    //Route::get('/home', 'HomeController@index');
    Route::get('/home', 'ProfileController@index');
    Route::get('/','ProfileController@index');
    Route::resource('bio', 'BioController');
    Route::resource('profile', 'ProfileController');
    Route::resource('skill', 'ExperienciaController');
    Route::resource('education', 'FormacionController');
    Route::resource('consulta', 'ConsultaController');
    //Route::get('profile', 'ProfileController@index');
    Route::get('consulta/verusuario/{id}','ConsultaController@verusuario');
    Route::get('bio/api/getRegions', 'BioController@getRegion');
    Route::get('bio/api/getCities', 'BioController@getCitie');
/*    Route::get('/', function () {
        return view('welcome');
    });*/

});

Route::group(['prefix'=>'admin', 'middleware'=> ['web'],'namespace' => 'admin'],   function() {

    Route::resource('users','UserController');

});