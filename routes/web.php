<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home',[StudentController::class,'home']);
Route::get('/home/{id}',[StudentController::class,'homeSearch']);

Route::post('/create',[StudentController::class,'create'])->name('create');
Route::post('/update',[StudetnController::class,'update'])->name('update');

Route::get('/testhelper',[StudentController::class,'testhelper']);

Route::post('/sendEmail',[StudentController::class,'sendEmail']);