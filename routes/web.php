<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', 'PostsController@showAll')->name('posts');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', 'PostsController@show')->name('post.show');


/**
 * administrator routes
 */
Route::prefix('admin')->group(function() {

   Route::get('posts', 'AdminPostsController@showAll')->name('posts.showAll');
   Route::get('posts/all', 'AdminPostsController@index')->name('posts.index');
   Route::post('posts/store', 'AdminPostsController@store')->name('posts.store');
   Route::delete('posts/{post}/delete', 'AdminPostsController@destroy')->name('posts.destroy');
   Route::get('posts/{id}/edit', 'AdminPostsController@edit')->name('posts.edit');
   Route::patch('posts/{id}/update', 'AdminPostsController@update')->name('posts.update');

});

Auth::routes();
