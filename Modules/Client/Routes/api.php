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

// Route::middleware('auth:api')->get('/client', function (Request $request) {
//     return $request->user();
// });


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth',
    'namespace' => 'api'

], function ($router) {

    Route::post('login', 'ClientAuthController@login');
    Route::post('register', 'ClientAuthController@register');
    Route::post('verify', 'ClientAuthController@verifyOtp');
    Route::post('logout', 'ClientAuthController@logout');
    Route::post('refresh', 'ClientAuthController@refresh');
    Route::post('me', 'ClientAuthController@me');



    Route::post('forgetPassword', 'ClientAuthController@forgetPassword');
    Route::post('verifyForgetPassword', 'ClientAuthController@verifyForgetPassword');
    Route::post('newPassword', 'ClientAuthController@newPassword');
});


Route::group([

    'middleware' => 'api',
    'prefix' => 'favourites',
    'namespace' => 'api'

], function ($router) {

    Route::post('toggle', 'FavouriteController@toggleFavourite');
    Route::get('all', 'FavouriteController@favourites');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'address',
    'namespace' => 'api'

], function ($router) {

    Route::post('store', 'AddressController@store');
    Route::get('all', 'AddressController@index');
    Route::delete('delete/{id}', 'AddressController@destroy');
});



Route::group([

    'middleware' => 'api',
    'prefix' => 'car',
    'namespace' => 'api'

], function ($router) {

    Route::post('store', 'CarController@store');
    Route::get('all', 'CarController@index');
    Route::delete('delete/{id}', 'CarController@destroy');
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'points',
    'namespace' => 'api'

], function ($router) {

    Route::post('convert', 'PointController@convert');
    Route::get('all', 'PointController@index');
});
