<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', 'Api\UserController@index');
Route::get('/user/{id}', 'Api\UserController@view');

Route::get('/post', 'Api\PostController@index');
Route::get('/post/{id}', 'Api\PostController@view');

Route::get('/comment', 'Api\CommentController@index');
Route::get('/comment/{id}', 'Api\CommentController@view');