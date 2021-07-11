<?php

use Illuminate\Support\Facades\Route;


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
        // Jenis Imunisasi
        Route::get('jenis_JenisImunisasi', 'backend\jenisImunisasiController@index')->name('index-jenisImunisasi');
        Route::get('create-jensiImunisasi', 'backend\jenisImunisasiController@create')->name('create-jenisImunisasi');
        Route::post('store-jenisImunisasi', 'backend\jenisImunisasiController@store')->name('store-jenisImunisasi');
        Route::get('edit-jenisImunisais/{id}', 'backend\jenisImunisasiController@edit')->name('edit-jenisImunisasi');
        Route::post('update-jenisImunisasi', 'backend\jenisImunisasiController@update')->name('update-jenisImunisasi');
        Route::delete('delete-jenisImunisasi/{jenis_imunisasi}', 'backend\jenisImunisasiController@delete')->name('delete-imunisasi');
        // Jenis Vitamin
        Route::get('jenis_jenisVitamin', 'backend\jenisVitaminController@index')->name('index-jenisVitamin');
        Route::get('create_jenisVitamin', 'backend\jenisVitaminController@create')->name('create-jenisVitamin');
        Route::post('store_jenisVitamin', 'backend\jenisVitaminController@store')->name('store-jenisVitamin');
        Route::get('edit-jenisVitamin/{id}', 'backend\jenisVitaminController@edit')->name('edit-jenisVitamin');
        Route::post('update-jenisVitamin', 'backend\jenisVitaminController@update')->name('update-jenisVitamin');
        Route::delete('delete-jenisVitamin/{jenisVitamin}', 'backend\jenisVitaminController@delete')->name('delete-jenisVitamin');
        // Checkup
        Route::get('index-checkUp', 'backend\checkUpController@index')->name('index-checkUp');
        Route::get('create-checkUp', 'backend\checkUpController@create')->name('create-checkUp');
        Route::post('store-checkUp', 'backend\checkUpController@store')->name('store-checkUp');
        Route::get('edit-checkup/{id}', 'backend\checkUpController@edit')->name('edit-checkUp');
        Route::post('update-checkup', 'backend\checkUpController@update')->name('update-checkUp');
        Route::delete('delete-checkUp/{checkUp}', 'backend\checkUpController@delete')->name('delete-checkUp');
    });
});

// Frontend
Route::prefix('home')->group(function () {
    Route::get('page', 'frontend\bidanController@index')->name('page');
    Route::get('data-imunisasi', 'frontend\bidanController@dataImunisasi')->name('dataImun');
});
