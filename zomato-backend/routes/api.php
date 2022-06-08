<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RestosController;
use App\Http\Controllers\CatagsController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\AdminController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/get_resto/{id?}',[RestosController::class, 'getRestos']);
Route::post('/add_resto',[RestosController::class, 'addResto']);

Route::post('/sign_up',[UsersController::class, 'signUp']);
Route::post('/login',[UsersController::class,'login']);

Route::post('/get_users',[AdminController::class,'getUsers']);

Route::post('/add_review',[ReviewsController::class,'addReview']);
Route::get('/get_reviews/{id}',[ReviewsController::class,'getReviews']);