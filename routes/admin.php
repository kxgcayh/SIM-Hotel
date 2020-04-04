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
    // City
    Route::resource('cities', 'CityController')
        ->except('create')->parameters(['cities' => 'slug']);

    // Hotel
    Route::resource('hotels', 'HotelController')
        ->except('create', 'show')->parameters(['hotels' => 'slug']);

    // Province
    Route::resource('provinces', 'ProvinceController')
        ->except(['create', 'show'])->parameters(['provinces' => 'slug']);

    // Room
    Route::resource('rooms', 'RoomController')
        ->parameters(['rooms' => 'slug']);

    // User
    Route::resource('users', 'UserController')->except('show');

    // Level
    Route::resource('levels', 'LevelController');
});
