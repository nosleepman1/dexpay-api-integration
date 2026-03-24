<?php

use App\Http\Controllers\PayementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;

// Route::get('/', [SubscriptionController::class, 'index'])->name('subscription.index');
// Route::any('/pay', [SubscriptionController::class, 'pay'])->name('subscription.pay');
// Route::get('/success', [SubscriptionController::class, 'success'])->name('subscription.success');
// Route::get('/cancel', [SubscriptionController::class, 'cancel'])->name('subscription.cancel');
// Route::any('/callback', [SubscriptionController::class, 'callback'])
//     ->name('subscription.callback');
   // ->withoutMiddleware([\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class]);


Route::get('/pay', [PayementController::class, 'pay']);

Route::get('/payment/success', [PayementController::class, 'success']);
Route::get('/payment/failed', [PayementController::class, 'failed']);

Route::post('/api/webhook/dexpay', [PayementController::class, 'webhook']);
