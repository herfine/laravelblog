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

Route::get('/', 'BLogController@Index');

Route::get('/blog/{slug}', [
	'uses' => 'BLogController@show',
	'as' => 'blog.show'
]);

Auth::routes();

Route::get('/home', 'backend\HomeController@index')->name('home');

Route::resource('/backend/blog', 'backend\BLogController',[
	'as' => 'backend'
]);