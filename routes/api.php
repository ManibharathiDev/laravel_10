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

  Route::post('/registration',[ApiController::class,'registration']);

  Route::post('/login',[ApiController::class,'login']);

  Route::group(['prefix'=>'test'],function(){
      Route::post('/readdata',[ApiController::class,'readdata']);
  });


  Route::post('/userregistration',[ApiController::class,'userregistration']);

  Route::post('/userlogin',[ApiController::class,'userlogin']);


  Route::group(['prefix'=>'admin'],function(){
      Route::post('/user',[ApiController::class,'testAdmin']);
      Route::post('/getuser',[ApiController::class,'getUser']);
  });

  Route::group(['prefix'=>'user'],function(){
    Route::post('/user',[ApiController::class,'testUser']);
    Route::post('/getuser',[ApiController::class,'getUsers']);
});

  Route::group(['prefix'=>'test'],function(){
    Route::post('/readdata',[ApiController::class,'readdata']);
});
