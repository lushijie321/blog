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

//Route::get('/', function () {
//	return 'Hello World';
//    //return view('welcome');
//});
Route::get('/', 'Home\HomeController@index');
Route::get('/admin', 'Admin\AdminController@index');
Route::get('/admin/article', 'Admin\ArticleController@index');
Route::get('/admin/article/add', 'Admin\ArticleController@add');
Route::get('/admin/article/edit', 'Admin\ArticleController@edit');
Route::get('/admin/article/del', 'Admin\ArticleController@del');
