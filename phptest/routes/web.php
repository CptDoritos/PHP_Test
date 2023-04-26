<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

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

Route::get('/getUsers', [PageController::class, 'getUsers']);


Route::get('/getMessages', [PageController::class, 'getMessages']);

//Route::post('setMessage/{contents}/{user_id}', [PageController::class, 'setMessage']);
//Route::post('setUser/{username}/{name}/{password}', [PageController::class, 'setMessage']);

Route::get('/getMessagesByUsers/{search}', [PageController::class, 'getMessagesByUsers']);



