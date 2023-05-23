<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
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
    return view('index');
})->middleware('language');

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('language');
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('language');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('language');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/home', [ItemController::class, 'showHome'])->middleware('authenticated','language');

Route::get('/item/{id}', [ItemController::class, 'showItem'])->middleware('authenticated','language');
Route::post('/buyItem/{id}', [ItemController::class, 'buyItem'])->middleware('authenticated');

Route::get('/cart', [OrderController::class, 'showCart'])->middleware('authenticated','language');
Route::get('/removeCart/{id}', [OrderController::class, 'removeCart'])->middleware('authenticated');
Route::post('/checkout', [OrderController::class, 'checkout'])->middleware('authenticated');

Route::get('/profile', [UserController::class, 'showProfile'])->middleware('authenticated','language');
Route::post('/saveProfile', [UserController::class, 'saveProfile'])->middleware('authenticated','language');

Route::get('/admin', [UserController::class, 'showAdmin'])->middleware('admin','language');
Route::get('/update/{id}', [UserController::class, 'showUpdate'])->middleware('admin','language');
Route::post('/update/{id}', [UserController::class, 'update'])->middleware('admin');

Route::get('/delete/{id}', [UserController::class, 'delete'])->middleware('admin');

Route::get('/language/{locale}', [LanguageController::class, 'language']);
