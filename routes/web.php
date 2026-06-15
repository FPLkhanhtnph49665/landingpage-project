<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Frontend\HomeController::class, 'index'])->name('home');

// Public frontend routes
Route::get('/children', [\App\Http\Controllers\Frontend\ChildController::class, 'index'])->name('children.index');
Route::get('/children/{child}', [\App\Http\Controllers\Frontend\ChildController::class, 'show'])->name('children.show');
Route::get('/campaigns', [\App\Http\Controllers\Frontend\CampaignController::class, 'index'])->name('campaigns.index');
Route::get('/campaigns/{campaign}', [\App\Http\Controllers\Frontend\CampaignController::class, 'show'])->name('campaigns.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin area (role protected)
    Route::middleware('role:super-admin|admin')->prefix('admin')->name('admin.')->group(function () {
        Route::resource('children', \App\Http\Controllers\Admin\ChildController::class);
        Route::resource('campaigns', \App\Http\Controllers\Admin\CampaignController::class);
        Route::resource('donations', \App\Http\Controllers\Admin\DonationController::class)->only(['index','show','destroy']);
    });
});

require __DIR__.'/auth.php';
