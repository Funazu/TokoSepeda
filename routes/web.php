<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);


// Login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('guest');

// Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->middleware('guest');

// Category
Route::get('/category', [CategoryController::class, 'index'])->middleware('auth');
Route::get('/category/create', [CategoryController::class, 'create'])->middleware('auth');
Route::post('/category/post', [CategoryController::class, 'store'])->middleware('auth');
Route::get('/category/edit/{category:id}', [CategoryController::class, 'edit'])->middleware('auth');
Route::post('/category/update/{category:id}', [CategoryController::class, 'update'])->middleware('auth');
Route::post('/category/delete/{category:id}', [CategoryController::class, 'destroy'])->middleware('auth');

// Product  
Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth');
Route::post('/product/post', [ProductController::class, 'store'])->middleware('auth');
Route::get('/product/edit/{product:id}', [ProductController::class, 'edit'])->middleware('auth');
Route::post('/product/update/{product:id}', [ProductController::class, 'update'])->middleware('auth');
Route::post('/product/delete/{product:id}', [ProductController::class, 'destroy'])->middleware('auth');