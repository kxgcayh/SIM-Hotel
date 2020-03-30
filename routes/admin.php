<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function () {    
    Route::resource('cities', 'CityController')->except('create');
    Route::resource('hotels', 'HotelController')->except('create');
    Route::resource('levels', 'LevelController');
    Route::resource('provinces', 'ProvinceController')
        ->except(['create', 'show']);
    Route::resource('rooms', 'RoomController');
});

Route::get('users', ['uses'=>'UserController@index', 'as'=>'users.index']);