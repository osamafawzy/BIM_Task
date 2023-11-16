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
Route::group([
    'namespace' => 'api',
    'prefix' => 'transaction'
], function ($router) {
    Route::post('store', 'TransactionController@store');
    Route::get('index', 'TransactionController@index');
    Route::get('client-index', 'TransactionController@client_index');

});

Route::group([
    'namespace' => 'api',
    'prefix' => 'payment'
], function ($router) {
    Route::post('store', 'PaymentController@store');

});

Route::group([
    'namespace' => 'api',
], function ($router) {
    Route::get('report', 'ReportController@index');

});
