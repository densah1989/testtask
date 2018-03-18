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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', '\App\Http\Controllers\Auth\RegisterController@register')->name('register');
Route::get('/confirm/{hash}', '\App\Http\Controllers\Auth\RegisterController@confirmEmail')->name('confirmEmail');
Route::post('/login', '\App\Http\Controllers\Auth\LoginController@prelogin')->name('login');
