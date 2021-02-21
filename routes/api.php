<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;

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

Route::get("get/{id?}",[productController::class,'getData']);
Route::post("post",[productController::class,'postData']);
Route::put("update",[productController::class,'update']);
Route::delete("delete/{id}",[productController::class,'delete']);
Route::get("search/{name}",[productController::class,'search']);
Route::post("test",[productController::class,'testData']);