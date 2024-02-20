<?php

use App\Http\Controllers\HotelsController;
use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    // DASHBOARD
    Route::get('/dashboard', [HotelsController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/create', [HotelsController::class, 'create'])->name('hotels.create');
    Route::post('/dashboard/create', [HotelsController::class, 'store'])->name('hotels.store');
    Route::get('/dashboard/{id}', [HotelsController::class, 'show'])->name('hotels.show');
    Route::get('/dashboard/{id}/edit', [HotelsController::class, 'edit'])->name('hotels.edit');
    Route::put('/dashboard/{id}/update', [HotelsController::class, 'update'])->name('hotels.update');
    Route::delete('/dashboard', [HotelsController::class, 'destroy'])->name('hotels.destroy');

    //RESERVATION
    Route::get('/dashboard/{id}/reservations', [ReservationsController::class, 'index'])->name('reservations.index');
    Route::get('/dashboard/{id}/reservations/create', [ReservationsController::class, 'create'])->name('reservations.create');
    Route::post('/dashboard/{id}/reservations/create', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::get('/dashboard/{id}/reservations/edit', [ReservationsController::class, 'edit'])->name('reservations.edit');
    Route::put('/dashboard/{id}/reservations/update', [ReservationsController::class, 'update'])->name('reservations.update');
    Route::delete('/dashboard/{id}/reservations', [ReservationsController::class, 'destroy'])->name('reservations.destroy');

    // HOTELS


    // PROFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
