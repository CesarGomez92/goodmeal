<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Products\ProductActionsController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Rounds\RoundsController;

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
    return view('layouts.app');
});

Route::get('/products/{product:code}', [ProductActionsController::class, 'findProduct']);
Route::post('/products', [ProductsController::class, 'store']);
Route::post('/rounds', [RoundsController::class, 'store']);
