<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', 'PublicController@index');

Route::get('/fakultas', ['as' => 'fakultas.fakultas', 'uses' => 'FakultasController@index']);
Route::get('/fakultasCreate', 'FakultasController@create');
Route::post('/fakultasStore', 'FakultasController@store');
Route::get('/fakultasDelete/{id_fak}', 'FakultasController@delete');
Route::get('/fakultasUpdate{id_fak}', 'FakultasController@update');
Route::post('/fakultasUpdateStore/{id_fak}', 'FakultasController@updateStore');

Route::get('/jurusan', 'JurusanController@index');

Route::get('/ruangan', 'RuanganController@index');

Route::get('/barang', 'BarangController@index');
