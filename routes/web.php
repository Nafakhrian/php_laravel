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


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postLogin', 'AuthController@postLogin');
Route::get('/register', 'AuthController@register');
Route::post('/postRegister', 'AuthController@postRegister');
Route::get('/logout', 'AuthController@logout');

//Email
Route::get('/sendemail', 'EmailController@send');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    //Fakultas
    Route::get('/fakultas', ['as' => 'fakultas.fakultas', 'uses' => 'FakultasController@index']);
    Route::get('/fakultas_create', 'FakultasController@create');
    Route::post('/fakultas_store', 'FakultasController@store');
    Route::get('/fakultas_delete/{id_fak}', 'FakultasController@delete');
    Route::get('/fakultas_update/{id_fak}', 'FakultasController@update');
    Route::post('/fakultas_update_store/{id_fak}', 'FakultasController@updateStore');
    Route::post('/fakultas_import', 'FakultasController@import');

    //Jurusan
    Route::get('/jurusan', ['as' => 'jurusan.jurusan', 'uses' => 'JurusanController@index']);
    Route::get('/jurusan_create', 'JurusanController@create');
    Route::post('/jurusan_store', 'JurusanController@store');
    Route::get('/jurusan_delete/{id_jur}', 'JurusanController@delete');
    Route::get('/jurusan_update/{id_jur}', 'JurusanController@update');
    Route::post('/jurusan_update_store/{id_jur}', 'JurusanController@updateStore');

    //Ruangan
    Route::get('/ruangan',['as' => 'ruangan.ruangan', 'uses' => 'RuanganController@index']);
    Route::get('/ruangan_create', 'RuanganController@create');
    Route::post('/ruangan_store', 'RuanganController@store');
    Route::get('/ruangan_delete{id_rua}', 'RuanganController@delete');
    Route::get('/ruangan_update{id_rua}', 'RuanganController@update');
    Route::post('/ruangan_update_store/{id_rua}', 'RuanganController@updateStore');


});

Route::group(['middleware' => ['auth','checkRole:admin,staff']], function(){
    Route::get('/', 'PublicController@index');

    //barang
    Route::get('/barang', ['as' => 'barang.barang', 'uses' => 'BarangController@index']);
    Route::get('/barang_create', 'BarangController@create');
    Route::post('/barang_store', 'BarangController@store');
    Route::get('/barang_delete/{id_bar}', 'BarangController@delete');
    Route::get('/barang_update/{id_bar}', 'BarangController@update');
    Route::post('/barang_update_store/{id_bar}', 'BarangController@updateStore');
    Route::get('/barang_export', 'BarangController@export');

});
