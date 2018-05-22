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

Route::resource('keys', 'KeyController');
//Route::resource('users', 'UserController');

Route::get('keys/{keySlug}/toggle', 'KeyController@toggle');
Route::get('keys/{keySlug}/open', 'KeyController@toggle');
Route::get('keys/{keySlug}/close', 'KeyController@toggle');

Route::get('properties/{slug}', 'PropertyController@show');

// Route::resource('keys', function () {
//     return 'Hallo ik ben door';
// });