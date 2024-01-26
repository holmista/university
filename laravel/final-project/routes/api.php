<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComplaintController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/user/{user}', [OrderController::class, 'getUserOrders'])->name('orders.user');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
});

Route::prefix('/order-items')->group(function () {
    Route::post('/', [OrderItemController::class, 'store'])->name('order-items.store');
});

Route::prefix(('/complaints'))->group(function () {
    Route::post('/', [ComplaintController::class, 'store'])->name('complaints.store');
});
