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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::post('/process', 'HomeController@process');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/gioithieu/edit', 'AdminController@gioithieu');
Route::put('/gioithieu/update', 'AdminController@updateGioithieu')->name('admin.updateGioithieu');
Route::get('/tintuc/edit', 'AdminController@tintuc');
Route::get('/phanhoi', 'AdminController@phanhoi');
Route::get('/lienhe', 'AdminController@lienhe');
Route::get('/category', 'AdminController@category');
Route::get('/product', 'AdminController@product');
Route::post('/ajaximage', 'AdminController@postImage');
Route::get('/news/admin', 'NewsController@admin')->middleware('auth');
Route::get('/category/admin', 'CategoryController@admin')->middleware('auth');
Route::get('/product/admin', 'ProductController@admin')->middleware('auth');
Route::get('/order', 'HomeController@order');

Route::resource('news', 'NewsController');
Route::resource('category', 'CategoryController');
Route::resource('product', 'ProductController');
