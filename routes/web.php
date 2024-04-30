<?php

use App\Http\Controllers\PaymentCategoryController;
use App\Http\Controllers\PaymentRequestController;
use App\Http\Controllers\PaymentStatusController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/paymentCategory', PaymentCategoryController::class);
    Route::resource('/paymentRequest', PaymentRequestController::class);
    Route::resource('/paymentStatus', PaymentStatusController::class);
});

require __DIR__.'/auth.php';
