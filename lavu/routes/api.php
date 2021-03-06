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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/user/register', 'userController@register');

Route::post('/user/login', 'userController@login');

Route::post('/user/token', 'userController@rememberTokenCheck');

Route::get('/article/read', "articleController@read");

Route::post('/article/write', "userArticleController@write");

Route::get("error/access_denied", "ErrorAnnouncementController@accessDenied");
