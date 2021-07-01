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
    return view('auth/login');
});

Auth::routes();

// Backend
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('admin', 'backend\adminController@index')->name('halaman-dashboard');
        // Balita
        Route::get('balita', 'backend\balitaController@index')->name('index-balita');
        Route::get('create-balita', 'backend\balitaController@create')->name('create-balita');
        Route::post('store-balita', 'backend\balitaController@store')->name('store-balita');
        Route::get('edit-balita/{id}', 'backend\balitaController@edit')->name('edit-balita');
        Route::post('update-balita', 'backend\balitaController@update')->name('update-balita');
        Route::delete('delete-balita/{balita}', 'backend\balitaController@delete')->name('delete-balita');
        // Jenis Kelamin
        Route::get('jenis_JenisImunisasi', 'backend\jenisImunisasiController@index')->name('index-jenisImunisasi');
        Route::get('create-jensiImunisasi', 'backend\jenisImunisasiController@create')->name('create-jenisImunisasi');
        Route::post('store-jenisImunisasi', 'backend\jenisImunisasiController@store')->name('store-jenisImunisasi');
    });
});
