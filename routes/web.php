<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// Public frontend routes
Route::get('/children', [\App\Http\Controllers\Frontend\ChildController::class, 'index'])->name('children.index');
Route::get('/children/{child}', [\App\Http\Controllers\Frontend\ChildController::class, 'show'])->name('children.show');
Route::get('/campaigns', [\App\Http\Controllers\Frontend\CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{campaign}', [\App\Http\Controllers\Frontend\CampaignController::class, 'show'])->name('campaigns.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin.role'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('children/{id}/restore', [\App\Http\Controllers\Admin\ChildController::class, 'restore'])->name('children.restore');
    Route::resource('children', \App\Http\Controllers\Admin\ChildController::class);
    Route::resource('campaigns', \App\Http\Controllers\Admin\CampaignController::class);
    Route::resource('donations', \App\Http\Controllers\Admin\DonationController::class)->only(['index','show','destroy']);
});

require __DIR__.'/auth.php';
