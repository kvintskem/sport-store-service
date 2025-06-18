<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function() {
    // Получение ресурсов
    Route::get('products',    [\App\Http\Controllers\Api\V1\RequestController::class, 'index']);
//    Route::get('categories',  [CategoryController::class, 'index']);
//    Route::get('news',        [NewsController::class, 'index']);
//
//    // Создание ресурсов
//    Route::post('requests',   [RequestController::class, 'store']);
//    Route::post('subscribe',   [SubscriptionController::class, 'subscribe']);
//    Route::post('unsubscribe', [SubscriptionController::class, 'unsubscribe']);
});
