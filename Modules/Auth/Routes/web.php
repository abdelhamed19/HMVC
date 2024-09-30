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

Route::prefix('auth')->group(function() {
    Route::get('/login', 'AuthController@getLogin')->name('get.login');
    Route::post('/login', 'AuthController@login')->name('post.login');
    Route::get('/register', 'AuthController@getRegister')->name('get.register');
    Route::post('/register', 'AuthController@register')->name('post.register');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
