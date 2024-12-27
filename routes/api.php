<?php

use App\Http\Controllers\api\authController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\TaskController as ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route Login
Route::post('apilogin',[authController::class, "Login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('apitask', ApiController::class);
    Route::get('apilogout', [authController::class, "Logout"]);
});;