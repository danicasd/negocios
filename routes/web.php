<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios', function () {
    //return view('welcome');
    return view('servicios');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', [ClienteController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
