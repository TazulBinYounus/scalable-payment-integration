<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::post('/payment/initiate', [PaymentController::class, 'initiatePayment']);

Route::post('/payment/callback/{paymentMethod}', [PaymentController::class, 'handleCallback']); //Most of the payment method use a callback 

Route::any('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
Route::any('/payment/fail', [PaymentController::class, 'paymentFail'])->name('payment.fail');
Route::any('/payment/cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');
