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
Route::prefix("students")->name('students.')->controller(StudentController::class)->group(function (){
    Route::get('/' ,'index')->name('index');
    Route::get('/edit/{student}',  'edit')->name('edit');
    Route::get('/add',  'store')->name('store');
    Route::post('/update/{student}',  'update')->name('update');
    Route::get('/delete/{student}',  'delete')->name('destory');
    Route::get('/list','getStudents')->name('list');
});

Route::prefix("users")->middleware('auth')->controller(UserController::class)->group(function (){
    Route::get('/',  'index')->name('users.index');
    Route::get('/{user}',  'show')->name('users.show');
    Route::get('/{user}/edit',  'edit')->name('users.edit');
    Route::get('/list',  'getStudents')->name('users.lists');//list.users
    Route::delete('/delete/user',  'delete')->name('users.delete');
    Route::put('/update/{user}' , 'update')->name('users.update');
    Route::post('/user' , 'destroy')->name('users.destroy');
});
Route::get('profile/{user?}', \App\Http\Controllers\profileUser::class)->name('users.profile');
Route::Resource('/category',CategoryController::class);
//Route::apiResource('/category',CategoryController::class);

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
