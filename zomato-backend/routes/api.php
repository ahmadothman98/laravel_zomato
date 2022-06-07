<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\RestosController;
use App\Http\Controllers\CatagsController;
use App\Http\Controllers\ReviewsController;
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
Route::get('/getresto/{id?}',[RestosController::class, 'getRestos']);
Route::post('/add_resto',[RestosController::class, 'addResto']);

Route::post('/add_user',[UsersController::class, 'addUser']);
