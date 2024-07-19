<?php

use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CommissionController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/affiliates', [AffiliateController::class, 'index'])->name('affiliates.index');
    Route::get('/affiliates/create', [AffiliateController::class, 'create'])->name('affiliates.create');
    Route::post('/affiliates', [AffiliateController::class, 'store']);
    Route::delete('/affiliates/{id}', [AffiliateController::class, 'destroy']);
    Route::post('/affiliates/{id}/update-status', [AffiliateController::class, 'updateStatus'])->name('affiliates.updateStatus');
    Route::get('/commissions', [CommissionController::class, 'index'])->name('commissions.index');
    Route::get('/commissions/create', [CommissionController::class, 'create'])->name('commissions.create');
    Route::post('/commissions', [CommissionController::class, 'store'])->name('commissions.store');
    Route::delete('/commissions/{id}', [CommissionController::class, 'destroy'])->name('commissions.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

