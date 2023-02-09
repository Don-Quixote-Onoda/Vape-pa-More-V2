<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Content\ProductTypesController as ContentProductTypesController;
use App\Http\Controllers\Content\ProductsController;
use App\Http\Controllers\Content\PaymentsController;
use App\Http\Controllers\Content\OrderDetailsController;
use App\Http\Controllers\Content\OrdersController;
use App\Http\Controllers\AdminController;

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
})->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix("/product-types")->group(function() {
        Route::get('/', [ContentProductTypesController::class, 'index'])->name('admin-product-types');
        Route::post('/store', [ContentProductTypesController::class, 'store'])->name('admin-store-product-types');
        Route::get('/edit/{id}', [ContentProductTypesController::class, 'edit'])->name('admin-edit-product-types');
        Route::post('/update/{id}', [ContentProductTypesController::class, 'update'])->name('admin-update-product-types');
        Route::delete('/destroy/{id}', [ContentProductTypesController::class, 'destroy'])->name('admin-destroy-product-types');
    });

    Route::prefix("/products")->group(function() {
        Route::get('/', [ProductsController::class, 'index'])->name('admin-products');
    });

    Route::prefix("/payments")->group(function() {
        Route::get('/', [PaymentsController::class, 'index'])->name('admin-payments');
    });

    Route::prefix("/order-details")->group(function() {
        Route::get('/', [OrderDetailsController::class, 'index'])->name('admin-order-details');
    });

    Route::prefix("/orders")->group(function() {
        Route::get('/', [OrdersController::class, 'index'])->name('admin-orders');
    });
    
});

Route::group(['prefix' => 'employee', 'middleware' => ['isEmployee', 'auth']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('employee.dashboard');
    
});

