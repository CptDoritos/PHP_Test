<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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


Route::post('/ext/setUser', [PageController::class, 'setUser']);
Route::get('/ext/getUsers', [PageController::class, 'getUsers']);

Route::post('/ext/setMessage', [PageController::class, 'setMessage']);
Route::get('/ext/getMessages', [PageController::class, 'getMessages']);


Route::get('/ext/getMessage/{search}', [PageController::class, 'getMessage']);
Route::get('/ext/getUser/{search}', [PageController::class, 'getUser']);

Route::get('/ext/getMessagesByUsers/{search}', [PageController::class, 'getMessagesByUsers']);





