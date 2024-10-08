<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Route untuk Welcome Page (Boleh jadi Home Page untuk User yang belum login)
Route::get('/', function () {
    return view('welcome');  // Welcome page untuk visitor yang belum login
})->name('welcome');

Route::get('/home', function () {
    return view('home');  // 
})->name('home');


// Dashboard Route with Email Verification
Route::middleware(['auth', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Weather Routes
Route::get('/weather', [WeatherController::class, 'index'])->name('weather.index');
Route::post('/weather/search', [WeatherController::class, 'search'])->name('weather.search');

// Add the delete route here
Route::delete('/weather/{id}/delete', [WeatherController::class, 'destroy'])->name('weather.delete');

// Add Email Verification Routes (Optional)
Auth::routes(['verify' => true]);  // Add this for email verification

require __DIR__.'/auth.php';  // Ensure Breeze or Fortify routes are loaded
