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

Route::get('/', function () {
    return view('home');
});

Route::resource('/category','CategoryController');

Route::resource('/tag','TagsController');

Route::get('/post/trashed_post', 'PostController@trashed_post')->name('post.trashed_post');

Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
Route::delete('/post/destroy_permanent/{id}', 'PostController@destroy_permanent')->name('post.destroy_permanent');

Route::resource('/post','PostController');
