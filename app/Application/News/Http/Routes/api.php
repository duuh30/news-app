<?php

use App\Application\News\Http\Controllers\CategoriesController;
use App\Application\News\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->prefix('api')->group(function() {
    Route::prefix('news')->group(function() {
        Route::get('/', [NewsController::class, 'index']);
        Route::get('{slug}', [NewsController::class, 'show']);
        Route::post('/', [NewsController::class, 'store']);
    });

    Route::prefix('categories')->group(function() {
        Route::get('/', [CategoriesController::class, 'index']);
        Route::post('/', [CategoriesController::class, 'store']);
    });
});