<?php

use Illuminate\Http\Request;
use Modules\Common\Http\Controllers\api\CommonController;
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

Route::get('/terms',  [CommonController::class, 'terms']);

Route::get('/about',  [CommonController::class, 'about']);


Route::get('/holidayTypes',  [\Modules\Common\Http\Controllers\api\HolidayTypesController::class, 'index']);

Route::get('/violations',  [\Modules\Common\Http\Controllers\api\ViolationController::class, 'index']);

Route::get('/subjects',  [\Modules\Common\Http\Controllers\api\SubjectController::class, 'index']);

Route::get('/teacher_levels',  [\Modules\Common\Http\Controllers\api\TeacherLevelsController::class, 'index']);

Route::get('/news',  [\Modules\Common\Http\Controllers\api\NewsController::class, 'index']);

Route::post('/contactUs',  [CommonController::class, 'contactUs']);
