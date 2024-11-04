<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CategoriesController;
use App\Http\Controllers\Api\TransactionsController;

Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categorie', [CategoriesController::class, 'store']);
Route::put('/categories/{id}', [CategoriesController::class, 'update']);
Route::delete('/categories/{id}', [CategoriesController::class, 'destroy']);

Route::get('/transaction/{id}', [TransactionsController::class, 'show']);
Route::get('/transactions', [TransactionsController::class, 'index']);
Route::post('/transaction', [TransactionsController::class, 'store']);
Route::delete('/transaction/{id}', [TransactionsController::class, 'destroy']);
Route::put('/transaction/{id}', [TransactionsController::class, 'update']);


