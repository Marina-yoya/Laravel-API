<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:sanctum')->get('/users', [UserController::class, 'getAllUsers']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::post('/products', [ProductController::class, 'createProduct']);
    Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
    Route::put('/products/{id}', [ProductController::class, 'updateProduct']);
});



Route::post('/register', 'App\Http\Controllers\Auth\RegisterController@register');
Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');

Route::get('/products', [ProductController::class, 'getAllProducts']);
Route::get('/products/{id}', [ProductController::class, 'getSingleProduct']);
// Route::post('/products', [ProductController::class, 'createProduct']);
// Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);
