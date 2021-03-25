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

Route::redirect('/', '/admin/login', 301);

// Auth
Route::namespace('auth')->group(function(){
    Route::get('/admin/login','LoginController@viewLoginAdmin');
    Route::post('/admin/login','LoginController@LoginAdmin');
    
    Route::get('/guru/login','LoginController@viewLoginGuru');
    Route::post('/guru/login','LoginController@LoginGuru');
    
    Route::get('/murid/login','LoginController@viewLoginMurid');
    Route::post('/murid/login','LoginController@LoginMurid');
    
    Route::get('/logout','LoginController@logout');

});


// Home
    Route::get('admin/home','HomeController@homeAdmin');
    Route::get('guru/home','HomeController@homeGuru');
    Route::get('murid/home','HomeController@homeMurid');


// Admin
Route::prefix('admin')->namespace('admin')->group(function(){
    Route::get('guru','GuruController@index');
    Route::post('guru/insert','GuruController@insert');
    Route::get('guru/edit/{id}','GuruController@edit');
    Route::post('guru/update','GuruController@update');
    Route::get('guru/delete/{nip}','GuruController@delete');

    Route::get('jurusan','JurusanController@index');
    Route::post('jurusan/insert','JurusanController@insert');
    Route::get('jurusan/edit/{id}','JurusanController@edit');
    Route::post('jurusan/update','JurusanController@update');
    Route::get('jurusan/delete/{nip}','JurusanController@delete');
    
    Route::get('kelas','KelasController@index');
    Route::post('kelas/insert','KelasController@insert');
    Route::get('kelas/edit/{id}','KelasController@edit');
    Route::post('kelas/update','KelasController@update');
    Route::get('kelas/delete/{nip}','KelasController@delete');

    Route::get('mapel','MapelController@index');
    Route::post('mapel/insert','MapelController@insert');
    Route::get('mapel/edit/{id}','MapelController@edit');
    Route::post('mapel/update','MapelController@update');
    Route::get('mapel/delete/{nip}','MapelController@delete');
    
    Route::get('mengajar','MengajarController@index');
    Route::post('mengajar/insert','MengajarController@insert');
    Route::get('mengajar/edit/{id}','MengajarController@edit');
    Route::post('mengajar/update','MengajarController@update');
    Route::get('mengajar/delete/{nip}','MengajarController@delete');
    
    Route::get('siswa','SiswaController@index');
    Route::post('siswa/insert','SiswaController@insert');
    Route::get('siswa/edit/{id}','SiswaController@edit');
    Route::post('siswa/update','SiswaController@update');
    Route::get('siswa/delete/{nip}','SiswaController@delete');
});


//Guru
Route::group([
    'prefix' => 'guru',
    'namespace' => 'guru',
],function(){
    Route::get('data-nilai','NilaiController@index');
    Route::get('data-nilai/insert/{id}','NilaiController@viewinsert');
    Route::post('data-nilai/insert','NilaiController@insert');
    Route::get('data-nilai/edit/{id}','NilaiController@edit');
    Route::post('data-nilai/update','NilaiController@update');
    Route::get('data-nilai/delete/{id}','NilaiController@delete');
});


//Murid
Route::group([
    'prefix' => 'murid',
    'namespace' => 'murid',
],function(){
    Route::get('nilai','NilaiController@index');
});