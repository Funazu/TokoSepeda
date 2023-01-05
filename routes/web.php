<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

// Login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('guest');

// Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->middleware('guest');

// Product
Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth');