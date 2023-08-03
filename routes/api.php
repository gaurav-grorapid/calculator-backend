<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('v1/auth/')->group(function(){
    Route::post('register','App\Http\Controllers\V1\Auth\RegisterController@handle')->middleware("empty-values");
    Route::post('login','App\Http\Controllers\V1\Auth\LoginController@handle')->middleware("empty-values");;
});

Route::prefix('v1/calculation/')->group(function(){
    Route::post('create','App\Http\Controllers\V1\Calculation\CalculationController@createCalculation')->middleware("empty-values");;
    Route::get('all/{uuid}','App\Http\Controllers\V1\Calculation\CalculationController@getAllCalculation');
    Route::put('update/{uuid}','App\Http\Controllers\V1\Calculation\CalculationController@updateCalculation')->middleware("empty-values");;
    Route::delete('delete/{uuid}','App\Http\Controllers\V1\Calculation\CalculationController@deleteCalculation');
});