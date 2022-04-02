<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;

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

Route::get('cvs',
'App\Http\Controllers\CVSController@showAll')->name('list_cvs');

Route::get('cvs/{id}',
'App\Http\Controllers\CVSController@show');

Route::get('cvs',
    'App\Http\Controllers\CVSController@querySearch')->name('list_cvs');

