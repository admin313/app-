<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

//Route::match(['post','get'],"/ir",function (){
//   return "iran";
//});
//Route::get('/{id?}',function ($id =1){
//   return $id;//? optionall id ,if 1 => $id defualt
//});
//Route::any('apps',function (){
//   return "apps" ;
//});
//Route::get("/{id}",function ($id){
//    return $id;
//})->where("id",'[0-9]+');//+ ==> >9
//Route::get("/{username}",function ($username){
//    return $username;
//})->where("username",'[A-Za-z]+');

Route::domain('{panel}.myapp.com')->group(function (){
    Route::get('/user/{id}',function ($panel,$id){
       return "panel";
    });
});

*/
Route::get("/hi",function (){
   return view("hi");
});
Route::prefix("students")->group(function (){
    Route::get('/', [StudentController::class, 'index']);
    Route::get('/list', [StudentController::class, 'getStudents'])->name('students.list');
});

Route::prefix("users")->middleware('auth')->group(function (){
    Route::get('/', [UserController::class, 'index'])->name('users.index');
    Route::get('/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('profile/{user?}', \App\Http\Controllers\profileUser::class)->name('users.profile');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::get('/list', [UserController::class, 'getStudents'])->name('users.lists');//list.users
    Route::delete('/delete/user', [UserController::class, 'delete'])->name('users.delete');
    Route::put('/update/{user}' ,[UserController::class, 'update'])->name('users.update');
    Route::post('/user' ,[UserController::class, 'destroy'])->name('users.destroy');
});
Route::Resource('/category',CategoryController::class);
Route::apiResource('/category',CategoryController::class);

Route::middleware('auth')->get('/', function () {
    return view('hi')->with('var','test');
//    return view('hi',['var'=>'test']);
//    $var='test';
//    return view('hi',compact('var'));
});
   // ->middleware('auth','CheckAdmin');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware("CheckStaff","CheckPhoneNumber");
Route::get('SetPhone',[\App\Http\Controllers\HomeController::class,'SetPhone'])->name('SetPhone');
Route::post('SetPhone',[\App\Http\Controllers\HomeController::class,'SetPhoneSave'])->name('SetPhone.save');

Route::fallback(function (){
   return "404 :} error";
});
