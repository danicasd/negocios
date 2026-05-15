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

Route::get('/catalogo', [ClienteController::class, 'catalogo'])
    ->middleware(['auth'])
    ->name('cliente.catalogo');

Route::get('/cotizar/{servicio}', [ClienteController::class, 'cotizar'])
    ->middleware(['auth'])
    ->name('cliente.cotizar');

Route::post('/cotizar/{servicio}', [ClienteController::class, 'guardarCotizacion'])
    ->middleware(['auth'])
    ->name('cliente.cotizar.guardar');

Route::get('/direccion', [ClienteController::class, 'direccion'])
    ->middleware(['auth'])
    ->name('cliente.direccion');

Route::post('/direccion', [ClienteController::class, 'guardarDireccion'])
    ->middleware(['auth'])
    ->name('cliente.direccion.guardar');

Route::get('/agendar', [ClienteController::class, 'agendar'])
    ->middleware(['auth'])
    ->name('cliente.agendar');

Route::post('/agendar', [ClienteController::class, 'guardarAgenda'])
    ->middleware(['auth'])
    ->name('cliente.agendar.guardar');

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [ClienteController::class, 'checkout'])
        ->name('cliente.checkout');
});

Route::get('/pago', [ClienteController::class, 'pago'])
    ->middleware(['auth'])
    ->name('cliente.pago');

Route::post('/pago', [ClienteController::class, 'confirmarPago'])
    ->middleware(['auth'])
    ->name('cliente.pago.confirmar');

Route::get('/pago/exito/{booking}', [ClienteController::class, 'pagoExito'])
    ->middleware(['auth'])
    ->name('cliente.pago.exito');

Route::middleware(['auth'])->group(function () {
    Route::get('/mis-servicios', [ClienteController::class, 'misServicios'])
        ->name('cliente.mis-servicios');
    
    Route::get('/mis-servicios/{id}', [ClienteController::class, 'detalleServicio'])
    ->name('cliente.servicio.detalle');
});

Route::patch('/mis-servicios/{id}/cancelar', [ClienteController::class, 'cancelarServicio'])
    ->name('cliente.servicio.cancelar');




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

        Route::resource('categories', AdminCategoryController::class)
            ->except(['show']);

        Route::resource('services', AdminServiceController::class)
            ->except(['show']);

        Route::resource('technicians', AdminTechnicianController::class)
            ->except(['show']);

        Route::get('/bookings', [AdminBookingController::class, 'index'])
            ->name('bookings.index');

        Route::get('/bookings/{booking}', [AdminBookingController::class, 'show'])
            ->name('bookings.show');

        Route::patch('/bookings/{booking}/assign-technician', [AdminBookingController::class, 'assignTechnician'])
            ->name('bookings.assign-technician');

        Route::patch('/bookings/{booking}/status', [AdminBookingController::class, 'updateStatus'])
            ->name('bookings.update-status');

        Route::patch('/bookings/{booking}/cancel', [AdminBookingController::class, 'cancel'])
            ->name('bookings.cancel');

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




require __DIR__.'/auth.php';
