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

// HOME

Route::get('/', function () {
    return redirect()->route('home');
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inbox', function() {
	return view('inbox');
})->name('inbox');

Route::get('/explore', function() {
	return view('explore');
})->name('explore');

Route::get('/notifications', function() {
	return view('heart');
})->name('heart');

Route::get('/{username}', 'HomeController@profile')->name('profile');

// USER

Route::post('/upload_avatar', 'AvatarController@store')->name('avatar');

Route::post('/remove_avatar/{id}', 'AvatarController@destroy')->name('avatar_remove');

Route::post('/upload_photo', 'PostController@store')->name('upload_photo');

Route::get('/user/{username}/post/{id}', 'PostController@show')->name('single_post');

Route::post('/store_comment', 'CommentsController@store')->name('store_comment');

Route::get('/like/{post_id}', 'LikeController@store')->name('like');

Route::get('/dislike/{post_id}', 'LikeController@destroy')->name('dislike');
