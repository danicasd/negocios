<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

// Pág de inicio
Route::get('/', function () {
    return view('welcome');
});

// Catálogo de servicios
Route::get('/servicios', function () {
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

// Cliente
Route::get('/dashboard', [ClienteController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/cotizar/{servicio}', [ClienteController::class, 'cotizar'])
        ->name('cliente.cotizar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/catalogo', [ClienteController::class, 'catalogo'])
        ->name('cliente.catalogo');

    Route::get('/cotizar/{servicio}', [ClienteController::class, 'cotizar'])
        ->name('cliente.cotizar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/direccion', [ClienteController::class, 'direccion'])
        ->name('cliente.direccion');
});

Route::get('/agendar', function () {
    return 'Vista agendar';
})->middleware(['auth'])->name('cliente.agendar');

Route::middleware(['auth'])->group(function () {
    Route::get('/agendar', [ClienteController::class, 'agendar'])
        ->name('cliente.agendar');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [ClienteController::class, 'checkout'])
        ->name('cliente.checkout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pago', [ClienteController::class, 'pago'])
        ->name('cliente.pago');
});

Route::post('/direccion', [ClienteController::class, 'guardarDireccion'])
    ->name('cliente.direccion.guardar');




require __DIR__.'/auth.php';
