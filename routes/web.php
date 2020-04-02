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
Route::get('/fakultasDelete{id_fak}', 'FakultasController@delete');
Route::get('/fakultasUpdate{id_fak}', 'FakultasController@update');
Route::post('/fakultasUpdateStore/{id_fak}', 'FakultasController@updateStore');

Route::get('/jurusan', ['as' => 'jurusan.jurusan', 'uses' => 'JurusanController@index']);
Route::get('/jurusanCreate', 'JurusanController@create');
Route::post('/jurusanStore', 'JurusanController@store');
Route::get('/jurusanDelete{id_jur}', 'JurusanController@delete');
Route::get('/jurusanUpdate{id_jur}', 'JurusanController@update');
Route::post('/jurusanUpdateStore/{id_jur}', 'JurusanController@updateStore');
Route::get('/jurusanSearch', 'JurusanController@search');

Route::get('/ruangan',['as' => 'ruangan.ruangan', 'uses' => 'RuanganController@index']);
Route::get('/ruanganCreate', 'RuanganController@create');
Route::post('/ruanganStore', 'RuanganController@store');

Route::get('/barang', ['as' => 'barang.barang', 'uses' => 'BarangController@index']);
Route::get('/barangCreate', 'BarangController@create');
Route::post('/barangStore', 'BarangController@store');
Route::get('/barangDelete{id_bar}', 'BarangController@delete');
Route::get('/barangUpdate{id_bar}', 'BarangController@update');
Route::post('/barangUpdateStore/{id_bar}', 'BarangController@updateStore');
