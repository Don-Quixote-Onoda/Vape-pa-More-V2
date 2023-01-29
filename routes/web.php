<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
});

Route::group(['prefix' => 'employee', 'middleware' => ['isEmployee', 'auth']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('employee.dashboard');
});