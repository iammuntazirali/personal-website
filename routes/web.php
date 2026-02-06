<?php
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', function() {
    return view('pages.home');
})->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/contact', function() {
    return view('pages.contact');
})->name('contact');


// Authenticated routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Breeze profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin project routes
    Route::get('/admin/projects', [ProjectController::class, 'adminIndex'])->name('admin.projects.index');
    Route::get('/admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('/admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
});

require __DIR__.'/auth.php';
