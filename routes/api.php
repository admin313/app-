<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashbordController;
use \App\Http\Controllers\api\v1\auth\authController;
use App\Http\Controllers\CategoryController;
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
Route::prefix("auth")->group(function (){
    Route::post('register', [authController::class, 'register']);
    Route::post('login', [authController::class, 'login']);
});
Route::apiResource('/category',CategoryController::class);

Route::prefix("student")->group(function (){
   Route::get('/listStudent',[\App\Http\Controllers\StudentController::class,"listStudent"])->name("student.list.group")->middleware("CheckStaff");
});


Route::middleware(["CheckPhoneNumber",'auth:sanctum'])->post('/panel',[Dashbordcontroller::class,"index"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
