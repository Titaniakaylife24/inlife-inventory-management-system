<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/inventory', fn() => view('pages.inventory'))->name('inventory');
Route::get('/roles', fn() => view('roles.index'))->name('roles');
Route::get('/reports', fn() => view('reports.index'))->name('reports');
Route::get('/about', fn() => view('about.index'))->name('about');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/inventory', function () {
        return view('inventory.index');
    })->name('inventory.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';