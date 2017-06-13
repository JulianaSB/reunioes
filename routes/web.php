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
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index');
Route::resource('reunioes', 'ReuniaoController');
Route::get('/edit-reuniao', 'ParticipaController@edicao');
Route::get('/welcome', 'LoginController@index');
Route::get('/logado', 'LogadoController@index');
Route::get('/reunioes-participa', 'ParticipaController@index');
Route::get('/manage', 'GerenciaReuniaoController@index');
Route::get('/update', 'ParticipaController@update');
Route::post('/testMail', 'ConviteController@testMail');