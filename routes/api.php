<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductTypesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\PaymentsController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v2')->group(function() {
    Route::prefix('/users')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('users');
        Route::get('/{id}', [UserController::class, 'show'])->name('user');
        Route::post('/', [UserController::class, 'store'])->name('add');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('v2')->group(function() {
    Route::prefix('/products')->group(function() {
        Route::get('/', [ProductsController::class, 'index'])->name('products');
        Route::get('/{id}', [ProductsController::class, 'show'])->name('product');
        Route::post('/', [ProductsController::class, 'store'])->name('add-product');
        Route::put('/update/{id}', [ProductsController::class, 'update'])->name('update-product');
        Route::delete('/destroy/{id}', [ProductsController::class, 'destroy'])->name('destroy-product');
    });
});

Route::prefix('v2')->group(function() {
    Route::prefix('/product_types')->group(function() {
        Route::get('/', [ProductTypesController::class, 'index'])->name('product-types');
        Route::get('/{id}', [ProductTypesController::class, 'show'])->name('product-type');
        Route::post('/', [ProductTypesController::class, 'store'])->name('add-product-type');
        Route::put('/update/{id}', [ProductTypesController::class, 'update'])->name('update-product-type');
        Route::delete('/destroy/{id}', [ProductTypesController::class, 'destroy'])->name('destroy-product-type');
    });
});

// Route::prefix('v2')->group(function() {
//     Route::prefix('/orders')->group(function() {
//         Route::get('/', [OrdersController::class, 'index'])->name('orders');
//         Route::get('/{id}', [OrdersController::class, 'show'])->name('order');
//         Route::post('/', [OrdersController::class, 'store'])->name('add-order');
//         Route::put('/update/{id}', [OrdersController::class, 'update'])->name('update-order');
//         Route::delete('/destroy/{id}', [OrdersController::class, 'destroy'])->name('destroy-order');
//     });
// });

Route::prefix('v2')->group(function() {
    Route::prefix('/order_details')->group(function() {
        Route::get('/', [OrderDetailsController::class, 'index'])->name('order-details');
        Route::get('/{id}', [OrderDetailsController::class, 'show'])->name('order-detail');
        Route::post('/', [OrderDetailsController::class, 'store'])->name('add-order-detail');
        Route::put('/update/{id}', [OrderDetailsController::class, 'update'])->name('update-order-detail');
        Route::delete('/destroy/{id}', [OrderDetailsController::class, 'destroy'])->name('destroy-order-detail');
    });
});

Route::prefix('v2')->group(function() {
    Route::prefix('/payments')->group(function() {
        Route::get('/', [PaymentsController::class, 'index'])->name('payments');
        Route::get('/{id}', [PaymentsController::class, 'show'])->name('payment');
        Route::post('/', [PaymentsController::class, 'store'])->name('add-payment');
        Route::put('/update/{id}', [PaymentsController::class, 'update'])->name('update-payment');
        Route::delete('/destroy/{id}', [PaymentsController::class, 'destroy'])->name('destroy-payment');
    });
});

Route::prefix('v2')->group(function() {
    Route::prefix('/logs')->group(function() {
        Route::get('/', [PaymentsController::class, 'index'])->name('logs');
        Route::get('/{id}', [PaymentsController::class, 'show'])->name('log');
        Route::post('/', [PaymentsController::class, 'store'])->name('add-log');
    });
});
