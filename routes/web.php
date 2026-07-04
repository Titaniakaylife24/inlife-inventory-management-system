<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\MyBorrowingController;
use App\Http\Controllers\EmployeeDashboardController;

/*
|--------------------------------------------------------------------------
| Guest (Landing Page)
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('home'))->name('home');

Route::get('/inventory', fn() => view('pages.inventory'))
    ->name('inventory');

Route::get('/roles', fn() => view('roles.index'))
    ->name('roles');

Route::get('/reports', fn() => view('reports.index'))
    ->name('reports');

Route::get('/about', fn() => view('about.index'))
    ->name('about');


/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::view('/dashboard/admin', 'dashboard.admin')
        ->name('dashboard.admin');

    Route::view('/dashboard/staff', 'dashboard.staff')
        ->name('dashboard.staff');

    Route::view('/dashboard/manager', 'dashboard.manager')
        ->name('dashboard.manager');

    Route::get('/dashboard/employee',
    [EmployeeDashboardController::class,'index'])
    ->name('dashboard.employee');

Route::get('/dashboard/borrow', [BorrowController::class, 'index'])
    ->name('borrow.index');

Route::get('/dashboard/borrow/{product}', [BorrowController::class, 'create'])
    ->name('borrow.create');

Route::post('/dashboard/borrow', [BorrowController::class, 'store'])
    ->name('borrow.store');

    Route::get('/dashboard/return', [ReturnController::class,'index'])
    ->name('return.index');

Route::post('/dashboard/return/{borrowing}', [ReturnController::class,'store'])
    ->name('return.store');

    Route::get('/dashboard/my-borrowings',
    [MyBorrowingController::class,'index'])
    ->name('myborrow.index');

Route::get('/dashboard/my-borrowings/{borrowing}',
    [MyBorrowingController::class,'show'])
    ->name('myborrow.show');

    /*
    |--------------------------------------------------------------------------
    | Inventory Dashboard
    |--------------------------------------------------------------------------
    */

    // Semua user login boleh melihat inventory
    Route::get('/dashboard/inventory', [ProductController::class, 'index'])
        ->name('dashboard.inventory.index');

    Route::get('/dashboard/inventory/{inventory}', [ProductController::class, 'show'])
        ->name('dashboard.inventory.show');


    /*
    |--------------------------------------------------------------------------
    | CRUD Inventory (Admin & Staff)
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:Admin,Staff')->group(function () {

        Route::get('/dashboard/inventory/create', [ProductController::class, 'create'])
            ->name('dashboard.inventory.create');

        Route::post('/dashboard/inventory', [ProductController::class, 'store'])
            ->name('dashboard.inventory.store');

        Route::get('/dashboard/inventory/{inventory}/edit', [ProductController::class, 'edit'])
            ->name('dashboard.inventory.edit');

        Route::put('/dashboard/inventory/{inventory}', [ProductController::class, 'update'])
            ->name('dashboard.inventory.update');

        Route::delete('/dashboard/inventory/{inventory}', [ProductController::class, 'destroy'])
            ->name('dashboard.inventory.destroy');

    });


    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';