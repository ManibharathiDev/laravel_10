<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiController;
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

Route::post('/update',[StudentController::class,'apiUpdate'])->name('update');

Route::post('/delete',[StudentController::class,'apiDelete'])->name('delete');

Route::post('/test',[StudentController::class,'test']);

Route::post('/updatedata',[ApiController::class,'updateData']);

Route::post('/deletedata',[ApiController::class,'deletedata']);


/**
 * Create New user
 */

 Route::post('/addNewUser',[ApiController::class,'addNewUser']);

 /**
  * Add New Post
  */

  Route::post('/addNewPost',[ApiController::class,'addNewPost']);

  /**
   * Retrive All Post
   */
  Route::get('/getAllPostByUser/{id}',[ApiController::class,'getAllPostByUser']);

/**
 * Add New Comment
 */

 Route::post('/addNewComment',[ApiController::class,'addNewComment']);

  /**
   * Retrive Comments
   */
  Route::get('/getAllCommentsByPost/{id}',[ApiController::class,'getAllCommentsByPost']);
