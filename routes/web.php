<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->prefix('admin')->group(function() {
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::resource('news', \App\Http\Controllers\NewsController::class);
//    Route::get('requests', [\App\Http\Controllers\Api\V1\RequestController::class, 'index'])->name('requests.index');
});

use App\Http\Controllers\TelegramWebhookController;

Route::match(['get','post'], '/telegram/webhook', [TelegramWebhookController::class, 'handle']);
Route::match(['get'], '/products', [\App\Http\Controllers\Api\V1\RequestController::class, 'index']);
