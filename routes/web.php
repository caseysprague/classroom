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

Route::view('/', 'welcome')->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/students', 'StudentController@index')->name('students');
Route::get('/student/{student}', 'StudentController@show')->name('student');
Route::post('/student', 'StudentController@store');
Route::delete('/student/{student}', 'StudentController@destroy');

Route::get('/checkout/{student}/{type}', 'LogController@checkout')->name('checkout');
Route::get('/checkin/{student}/{logEntry}', 'LogController@checkin')->name('checkin');
