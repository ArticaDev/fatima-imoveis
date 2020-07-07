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


Route::redirect('/', 'casas');
Route::resource('casas','HouseController');
Route::get('pesquisar', 'HouseController@search');


Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
