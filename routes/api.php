<?php

use App\Http\Controllers\DictionaryController;
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
Route::get('/dictonary/getdictionary', [DictionaryController::class, 'getDictionary']);
Route::post('/getEng', [DictionaryController::class, 'getEng']);
Route::post('/getUz', [DictionaryController::class, 'getUz']);
Route::post('/getRu', [DictionaryController::class, 'getRu']);

