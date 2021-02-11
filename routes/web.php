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

Route::middleware(['guest'])->group(function () {

    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');

});


Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('main');
    })->name('home');

    Route::get('/game', function () {
        return view('main');
    })->name('game');

    Route::get('/settings', function () {
        return view('main');
    })->name('settings');

    Route::post('/settings', 'SettingsController@store');

    Route::get('/history', 'GameController@show');
    Route::post('/history', 'GameController@store');

    Route::any('api/cities', 'CitiesController@index');
});

require __DIR__ . '/auth.php';
