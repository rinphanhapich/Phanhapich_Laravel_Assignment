<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;

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

//Book API Routes
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::post('/books', [BookController::class, 'create']);
Route::put('/books/{id}', [BookController::class, 'edit']);
Route::delete('/books/{id}', [BookController::class, 'delete']);

//Author API Routes
Route::get('/authors', [AuthorController::class, 'index']);
Route::get('/authors/{id}', [AuthorController::class, 'show']);
Route::post('/authors', [AuthorController::class, 'create']);
Route::put('/authors/{id}', [AuthorController::class, 'edit']);
Route::delete('/authors/{id}', [AuthorController::class, 'delete']);


//User API Routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'create']);
Route::put('/users/{id}', [UserController::class, 'edit']);
Route::delete('/users/{id}', [UserController::class, 'delete']);





Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
