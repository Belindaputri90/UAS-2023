<?php

use App\Http\Controllers\KomentarController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\SentimentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    echo env('APP_NAME');
});

//Route::controller('UsersController'::class);

Route::get('/postings',[PostingController::class,'index']);
Route::get('/postings/{idposting}',[PostingController::class,'show']);
Route::post('/postings',[PostingController::class,'store']);
Route::put('/postings',[PostingController::class,'update']);
Route::delete('/postings',[PostingController::class,'destroy']);

Route::get('/komentars',[KomentarController::class,'index']);
Route::get('/komentars/{id}',[KomentarController::class,'show']);
Route::post('/komentars',[KomentarController::class,'store']);
Route::put('/komentars',[KomentarController::class,'update']);
Route::delete('/komentars',[KomentarController::class,'destroy']);

Route::get('/cek',[SentimentController::class,'cek']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
