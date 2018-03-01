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

Route::resource('register', 'UserController');

Route::post('signIn', 'UserController@signIn');

Route::get('signOut', 'UserController@signOut');

Route::get('message', 'MessageController@getMessage');

Route::get('/message/se', 'MessageController@getSeMessage');

Route::get('/message/tj', 'MessageController@getTjnewsMessage');

//Route::get('/message/se/?page={page}', 'MessageController@getSeMessage');

//Route::redirect('/message/tj/{page}', '/message/tj/?page={page}', 301);

//Route::redirect('/message/se/{page}', '/message/se/?page={page}', 301);



