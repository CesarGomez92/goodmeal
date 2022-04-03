<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Rounds\RoundsController;
use App\Http\Controllers\Products\ProductsController;
use App\Http\Controllers\Rounds\RoundsActionsController;
use App\Http\Controllers\Products\ProductActionsController;
use App\Http\Controllers\ProductsFound\ProductsFoundController;
use App\Http\Controllers\ProductsFound\ProductsFoundActionsController;

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
Route::get('/rounds', [RoundsActionsController::class, 'getRoundsList']);
Route::post('/product-founds/{round}', [ProductsFoundController::class, 'store']);
Route::get('/rounds/{round}/products-founds-without-group', [RoundsActionsController::class, 'getProductsFoundWthoutGroups']);
