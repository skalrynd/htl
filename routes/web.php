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

Route::get('/', [\App\Http\Controllers\AdminController::class, 'index']);
Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index']);
Route::get('/orders/create', [\App\Http\Controllers\OrderController::class, 'create']);
Route::post('/orders', [\App\Http\Controllers\OrderController::class, 'store']);
Route::get('/order/{id}/delete', [\App\Http\Controllers\OrderController::class, 'delete']);

Route::get('/vehicle/{id}/keys', [\App\Http\Controllers\VehicleController::class, 'keys']);
