<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AdminTicketController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- НАШИ МАРШРУТЫ ---

    // Для обычных пользователей (CRUD заявок)
    Route::resource('tickets', TicketController::class)->only(['index', 'create', 'store']);

    // Для Админа (используем middleware 'admin', который создали)
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/tickets', [AdminTicketController::class, 'index'])->name('tickets.index');
        Route::patch('/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('tickets.update');
    });
});

require __DIR__.'/auth.php';
