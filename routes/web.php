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

Route::post('/user-register', 'AuthController@register')->name('user.register');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user-profile', 'AuthController@profile')->name('user.profile');
Route::post('/udpate-profile', 'AuthController@updateProfile')->name('update.profile');

Route::get('/logs', 'HomeController@logs')->name('logs');


