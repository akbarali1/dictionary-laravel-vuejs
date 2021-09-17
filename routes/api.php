<?php

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

Route::post('/getEng', [\App\Http\Controllers\DictionaryController::class, 'getEng']);
Route::post('/getUz', [\App\Http\Controllers\DictionaryController::class, 'getUz']);
Route::post('/getRu', [\App\Http\Controllers\DictionaryController::class, 'getRu']);

Route::post('/category/save', [\App\Http\Controllers\DictionaryController::class, 'categoryStore']);
Route::post('/dictonary/save', [\App\Http\Controllers\DictionaryController::class, 'dictonaryStore']);
