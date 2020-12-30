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
use App\Http\Controllers;


Route::get('/', 'NoteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('notes', NoteController::class);
Route::view('test', 'layouts.search');
Route::get('/search', 'NoteController@search');
