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

Route::middleware('auth')->group(function() {
    Route::name('admin.')->group(function() {
        Route::get('/', 'HomeController@index')->name('home');

        /**
         * Equipments resource
         */
        Route::get('equipments/trashed', 'EquipmentController@trashed')->name('equipments.trashed');
        Route::resource('equipments', 'EquipmentController');
        Route::delete('equipments/{equipment}', 'EquipmentController@trash')->name('equipments.trash');
    });
});