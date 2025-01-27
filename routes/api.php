<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post("register_admin",[AuthController::class,"register"]);
Route::get("get_user",[AuthController::class,"getuser"]);
Route::get("get_user_id/{id}",[AuthController::class,"getuserid"]);
Route::put("update_user/{id}",[AuthController::class,"update"]);
Route::delete("delete/{id}",[AuthController::class,"delete"]);
Route::post("login",[AuthController::class,"login"]);
Route::get("logout",[AuthController::class,"logout"]);