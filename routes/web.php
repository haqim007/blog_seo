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

Auth::routes();
Route::get('/', 'BlogController@index')->name('blog.home');
Route::get('/list-post', 'BlogController@list_post')->name('blog.list_post');
Route::get('/read-post/{slug}', 'BlogController@read_post')->name('blog.read_post');
Route::get('/list-category/{category}', 'BlogController@list_category')->name('blog.category');

Route::get('/search', 'BlogController@search')->name('blog.search');

Route::group(['middleware'=>'auth'], function(){

	Route::get('/home', 'HomeController@index')->name('home');

	Route::resource('/category','CategoryController');

	Route::resource('/tag','TagsController');

	Route::get('/post/trashed_post', 'PostController@trashed_post')->name('post.trashed_post');

	Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
	Route::delete('/post/destroy_permanent/{id}', 'PostController@destroy_permanent')->name('post.destroy_permanent');

	Route::resource('/post','PostController');
	Route::resource('/user', 'UserController');

});




