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

Route::get('/', 'ScanController@create');

Route::post('/scan', 'ScanController@store');

Route::get('/login', [ 'as' => 'login', 'uses' => 'LoginController@create']);

Route::post('/login', [ 'as' => 'login', 'uses' => 'LoginController@store']);

Route::get('/admin', 'AdminController@index');

Route::get('/admin/employees', 'EmployeesController@index');

Route::any('/admin/employees/search', 'EmployeesController@search');

Route::post('/admin/employees/create', 'EmployeesController@store');

Route::patch('/admin/employees/update', 'EmployeesController@update');

Route::delete('/admin/employees/delete/{employee}', 'EmployeesController@delete');

Route::post('/admin/employees/', 'QrCodeController@index');

Route::get('/admin/attendance', 'AttendancesController@index');

Route::post('/admin/attendance/events', 'AttendancesController@events');

Route::post('/admin/attendance/export', 'AttendancesController@export');

Route::delete('/admin/attendance/delete/{attendance}', 'AttendancesController@delete');

Route::get('/admin/notifications', 'NotificationsController@index');

Route::get('/logout', 'LoginController@destroy');

Route::get('/markAsRead', function () {
	auth()->user()->unreadNotifications->markAsRead();
});
