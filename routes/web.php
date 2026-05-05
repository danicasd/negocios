<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

// Controladores del administrador
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminServiceController;
use App\Http\Controllers\Admin\AdminTechnicianController;
use App\Http\Controllers\Admin\AdminBookingController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminCategoryController;

Route::get('/', function () {
    return view('welcome');
});

// Catálogo de servicios
Route::get('/servicios', function () {
    return view('servicios');
});


/*
|--------------------------------------------------------------------------
| Rutas del cliente
|--------------------------------------------------------------------------
*/

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


/*
|--------------------------------------------------------------------------
| Rutas del administrador
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');
        
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('categories.create');

        Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::get('/services', [AdminServiceController::class, 'index'])
            ->name('services.index');
        
        Route::get('/services/create', [AdminServiceController::class, 'create'])
            ->name('services.create');

        Route::get('/services/{id}/edit', [AdminServiceController::class, 'edit'])
            ->name('services.edit');

        Route::get('/technicians', [AdminTechnicianController::class, 'index'])
            ->name('technicians.index');
        
        Route::get('/technicians/create', [AdminTechnicianController::class, 'create'])
            ->name('technicians.create');

        Route::get('/technicians/{id}/edit', [AdminTechnicianController::class, 'edit'])
            ->name('technicians.edit');

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::get('/bookings/{id}', [AdminBookingController::class, 'show'])
            ->name('bookings.show');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');
    });



/*
|--------------------------------------------------------------------------
| Perfil
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


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
