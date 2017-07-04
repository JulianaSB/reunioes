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
Route::get('/manageMeeting', 'GerenciaController@index');
Route::get('/viewMeeting/{reuniao}', 'GerenciaController@view');
Route::get('/editManageMeeting/{reuniao}', 'GerenciaController@edit');
Route::get('/manageAta/{reuniao}', 'GerenciaController@addata');
Route::put('/updateMeeting/{reuniao}', 'GerenciaController@update');
Route::get('/deleteMeeting/{reuniao}', 'GerenciaController@destroy');
Route::resource('reunioesGerencia', 'GerenciaController');
Route::get('/participeMeeting', 'ParticipaController@index');
Route::get('/editMeeting/{reuniao}', 'ParticipaController@edit');
Route::resource('reunioesParticipa', 'ParticipaController');
Route::resource('save-ata', 'GerenciaController@updateAta');