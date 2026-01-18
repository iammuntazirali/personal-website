<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('pages.home');
})->name('home');

Route::get('/education', function() {
    return view('pages.education');
})->name('education');

Route::get('/languages', function() {
    return view('pages.languages');
})->name('languages');

Route::get('/certificates', function() {
    return view('pages.certificates');
})->name('certificates');

Route::get('/projects', function() {
    return view('pages.projects');
})->name('projects');

Route::get('/experience', function() {
    return view('pages.experience');
})->name('experience');