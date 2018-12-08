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

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/category/{category}', 'CategoryController@Index');
Route::get('/forum/{forum}', 'ForumController@Index');
Route::get('/post/{post}', 'PostController@Index');
Route::get('/post/{post}/add', 'PostController@Show');
Route::post('/post/{post}/add', 'PostController@Create');
Route::get('/forum/{forum}/new', 'NewPostController@Index');
Route::post('/forum/{forum}/new', 'NewPostController@Create');
Route::get('/post/{post}/edit', 'ManipulatePostController@Index');
Route::post('/post/{post}/edit', 'ManipulatePostController@Store');
Route::get('/post/{post}/delete', 'ManipulatePostController@Destroy');
Route::get('/post/{post}/sticky', 'ManipulatePostController@Sticky');
Route::get('/post/{post}/lock', 'ManipulatePostController@Lock');
Route::get('/account', 'AccountController@Index');
Route::post('/account', 'AccountController@Store');