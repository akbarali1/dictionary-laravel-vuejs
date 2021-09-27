<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DicCreateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\DictionaryController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dictionary/create', [\App\Http\Controllers\DictionaryController::class, 'create']);
    Route::post('/dictionary/save', [DicCreateController::class, 'dictonaryStore']);

    Route::get('/category/create', [\App\Http\Controllers\DictionaryController::class, 'category']);
    Route::post('/category/save', [\App\Http\Controllers\DictionaryController::class, 'categoryStore']);


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
