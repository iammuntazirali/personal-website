<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', function() {
    return view('pages.home');
})->name('home');

Route::get('/projects', function() {
    return view('pages.projects');
})->name('projects');

Route::get('/about', function() {
    return view('pages.about');
})->name('about');

Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');


// Authenticated routes (from Breeze)

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
