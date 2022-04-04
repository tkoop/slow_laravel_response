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



// According to RouteServiceProvider, all these api calls will begin with "api/", so don't add that in here.



Route::get('/v1/simpleArray', [\App\Http\Controllers\APIController::class, "simpleArray"]);
Route::get('/v1/responseObject', [\App\Http\Controllers\APIController::class, "responseObject"]);


Route::get('/examples', function () {
    return view('apiexamples');
});
