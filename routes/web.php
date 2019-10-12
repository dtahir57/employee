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

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/employees', 'EmployeeController@index')->name('employee.index');
	Route::get('/attendances', 'AttendanceController@index')->name('attendance.index');
	Route::get('/attendance/create', 'AttendanceController@create')->name('attendance.create');
	Route::post('/attendance', 'AttendanceController@store')->name('attendance.store');
	Route::get('/attendance/{date}', 'AttendanceController@show')->name('attendance.show');
	Route::get('/attendance/{date}/edit', 'AttendanceController@edit')->name('attendance.edit');
	Route::post('/attendances/{date}', 'AttendanceController@update')->name('attendance.update');
});
