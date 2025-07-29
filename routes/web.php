<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return view('welcome'); // c’est ici que Vue est injecté
// });
Route::get('/{any}', function () {
    return view('welcome');
})->where('any', '^(?!api).*$');

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/{any}', function () {
//     return view('welcome');
// })->where('any', '.*');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
