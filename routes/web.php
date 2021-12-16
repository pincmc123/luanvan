<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderdetailController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\ProductController;
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

Route::match(['get', 'post'], '/login', [LoginController::class, 'login'])->name('login');

Route::middleware('auth')->group(function (){
    Route::get('/admin', [HomeController::class, 'index'])->name('homeadmin');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::resources([
        'admin/product' => ProductController::class,
        'admin/catalog' => CatalogController::class,
        'admin/order' => OrderController::class,
        'admin/user'=> UserController::class,
    ]);
});

Route::get('/user', [HomeController::class, 'index1'])->name('homeuser');




