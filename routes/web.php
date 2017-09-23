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
Route::get('/students', 'StudentController@index')->name('students');
Route::get('/student/{uuid}', 'StudentController@show')->name('student');

Route::get('/checkout/{uuid}/{type}', 'LogController@checkout')->name('checkout');
Route::get('/checkin/{uuid}/{logEntryId}', 'LogController@checkin')->name('checkin');
