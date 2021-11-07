<?php

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
Route::post('/add', [App\Http\Controllers\PostController::class, 'store']);
Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/show/{id}', [App\Http\Controllers\PostController::class, 'show']);
Route::get('/edit/{id}', [App\Http\Controllers\PostController::class, 'edit']);
Route::get('/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy']);
Route::post('/update/{id}', [App\Http\Controllers\PostController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
