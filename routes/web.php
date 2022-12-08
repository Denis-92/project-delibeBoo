<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'HomeController@index');
        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
        Route::resource('resturants', 'ResturantController');
        Route::resource('orders', 'OrderController');
        Route::resource('plates', 'PlateController');
        Route::get('/piatti', 'PlateController@basePlate')->name('basePlate');
        Route::resource('users', 'UserController');
    });

Auth::routes();
