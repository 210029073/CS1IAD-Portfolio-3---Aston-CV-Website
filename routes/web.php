<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Input;
use \App\Http\Controllers\CVSController;
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
    return view('main.index');
});

Route::get('main', function () {
    return view('main.index');
})->name('main');

Route::get('contacts', function () {
    return view('main.contacts');
})->name('contacts');

Route::get('project', function () {
    return view('main.projects');
})->name('project');

Route::get('all',
'App\Http\Controllers\CVSController@showAllRecords')->name('list_cvs');


Route::get('cvs/{id}',
'App\Http\Controllers\CVSController@show')->name('cvs');

Route::get('cvs',
    'App\Http\Controllers\CVSController@querySearch')->name('search_cvs');

Route::get('create', [CVSController::class, 'insertForm'])->name('create');
Route::post('create', [CVSController::class, 'appendCV'])->name('create');

Route::get('update', [CVSController::class, 'updateForm'])->name('update');
Route::post('update', [CVSController::class, 'updateCV'])->name('update');

Route::get('update',
    'App\Http\Controllers\CVSController@updateSearch');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
