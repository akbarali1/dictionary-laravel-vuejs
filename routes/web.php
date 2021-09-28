<?php

use App\Http\Controllers\DicCreateController;
use App\Http\Controllers\DictionaryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::get('/', [DictionaryController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/dictionary/create', [DictionaryController::class, 'create']);
    Route::post('/dictionary/save', [DicCreateController::class, 'dictonaryStore']);

    Route::get('/category/create', [DictionaryController::class, 'category']);
    Route::post('/category/save', [DictionaryController::class, 'categoryStore']);

});

Route::get('/home', [HomeController::class, 'index'])->name('home');
