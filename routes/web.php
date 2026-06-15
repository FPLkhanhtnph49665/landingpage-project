<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Frontend routes
Route::prefix('')->group(function () {
    Route::get('/children', [\App\Http\Controllers\Frontend\ChildController::class, 'index'])->name('children.index');
    Route::get('/children/{child}', [\App\Http\Controllers\Frontend\ChildController::class, 'show'])->name('children.show');
    Route::get('/campaigns', [\App\Http\Controllers\Frontend\CampaignController::class, 'index'])->name('campaigns.index');
    Route::get('/campaigns/{campaign}', [\App\Http\Controllers\Frontend\CampaignController::class, 'show'])->name('campaigns.show');
});

// Admin routes (basic scaffolding)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('children', \App\Http\Controllers\Admin\ChildController::class);
    Route::resource('campaigns', \App\Http\Controllers\Admin\CampaignController::class);
    Route::resource('donations', \App\Http\Controllers\Admin\DonationController::class)->only(['index','show','destroy']);
});
