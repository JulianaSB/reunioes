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
Route::get('/logado', 'LogadoController@index');
Route::resource('reunioes', 'ReuniaoController');
Route::get('/manageMeeting', 'GerenciaReuniaoController@index');
Route::get('/viewMeeting/{reuniao}', 'GerenciaReuniaoController@view');
Route::get('/editManageMeeting/{reuniao}', 'GerenciaReuniaoController@edit');
Route::get('/deleteMeeting/{reuniao}', 'GerenciaReuniaoController@destroy');
Route::resource('reunioesGerencia', 'GerenciaReuniaoController');
Route::get('/reunioes-participa', 'ParticipaController@index');
Route::get('/edit-reuniao/{reuniao}', 'ParticipaController@edit');
Route::get('/gerencia-ata/{reuniao}', 'GerenciaReuniaoController@addata');
Route::post('reunioes', 'ReuniaoController@testMail');
Route::resource('reunioesParticipa', 'ParticipaController');
