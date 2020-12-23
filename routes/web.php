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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index']);
Route::get('/users/add', [App\Http\Controllers\UserController::class, 'add']);
Route::post('/users/add', [App\Http\Controllers\UserController::class, 'store']);
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
Route::put('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'update']);
Route::get('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'delete']);


Route::get('/websites', [App\Http\Controllers\WebsiteController::class, 'index']);
Route::get('/websites/view/{id}', [App\Http\Controllers\WebsiteController::class, 'view']);
Route::get('/websites/approve/{id}', [App\Http\Controllers\WebsiteController::class, 'approve']);
Route::get('/websites/add', [App\Http\Controllers\WebsiteController::class, 'add']);
Route::post('/websites/add', [App\Http\Controllers\WebsiteController::class, 'store']);
Route::get('/websites/edit/{id}', [App\Http\Controllers\WebsiteController::class, 'edit']);
Route::put('/websites/edit/{id}', [App\Http\Controllers\WebsiteController::class, 'update']);
Route::get('/websites/delete/{id}', [App\Http\Controllers\WebsiteController::class, 'delete']);

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index']);
Route::get('/orders/view/{id}', [App\Http\Controllers\OrderController::class, 'view']);
Route::get('/orders/confirm/{id}', [App\Http\Controllers\OrderController::class, 'confirm']);
Route::get('/orders/{id}', [App\Http\Controllers\OrderController::class, 'order']);
Route::post('/orders/{id}', [App\Http\Controllers\OrderController::class, 'postOrder']);
