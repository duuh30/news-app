<?php

use App\Application\Contact\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->prefix('api')->group(function() {
    Route::prefix('contact')->group(function() {
        Route::post('/', [ContactController::class, 'store']);
    });
});