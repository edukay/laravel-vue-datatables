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

Route::resource('/datatable/users', 'DataTable\UserController');
Route::resource('/datatable/plans', 'DataTable\PlanController');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/impersonate', 'Admin\ImpersonateController@index')->name('admin.impersonate');
Route::post('/admin/impersonate', 'Admin\ImpersonateController@store');
Route::delete('/admin/impersonate', 'Admin\ImpersonateController@destroy');

Route::get('/admin/users', 'Admin\UserController@index');
Route::get('/admin/plans', 'Admin\PlanController@index');