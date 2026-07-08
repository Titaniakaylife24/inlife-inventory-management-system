

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReturnController;
use App\Http\Controllers\MyBorrowingController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\BorrowRequestController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestInventoryController;
use App\Http\Controllers\GuestReportController;

/*
|--------------------------------------------------------------------------
| Guest (Landing Page)
|--------------------------------------------------------------------------
*/



Route::get('/', [HomeController::class, 'index'])
    ->name('home');


    
Route::get('/inventory', [GuestInventoryController::class,'index'])
    ->name('inventory');

Route::get('/roles', fn() => view('roles.index'))
    ->name('roles');

Route::get('/reports', [GuestReportController::class,'index'])
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

    Route::get('/dashboard/staff',
    [DashboardController::class,'staff'])
    ->name('dashboard.staff');


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


    Route::middleware('role:Admin,Staff')->group(function () {

        Route::get('/dashboard/inventory/create', [ProductController::class, 'create'])
        ->name('dashboard.inventory.create');

    Route::post('/dashboard/inventory', [ProductController::class, 'store'])
        ->name('dashboard.inventory.store');

    Route::get('/dashboard/inventory/{inventory}/edit', [ProductController::class, 'edit'])
        ->name('dashboard.inventory.edit');

    Route::put('/dashboard/inventory/{inventory}', [ProductController::class, 'update'])
        ->name('dashboard.inventory.update');

    Route::get('/dashboard/inventory/{inventory}', [ProductController::class, 'show'])
        ->name('dashboard.inventory.show');


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

Route::middleware(['auth','role:Staff'])->prefix('dashboard')->group(function () {

    Route::get('/stock-monitoring', [StockController::class, 'index'])
        ->name('stock.index');

     Route::get('/borrow-request',
        [BorrowRequestController::class,'index'])
        ->name('borrow-request.index');

    Route::get('/borrow-request/{borrowing}',
        [BorrowRequestController::class,'show'])
        ->name('borrow-request.show');

    Route::get('/report', [ReportController::class, 'index'])
        ->name('report.index');

    Route::get('/report/export/excel', [ReportController::class, 'exportExcel'])
    ->name('report.export.excel');

Route::get('/report/export/pdf', [ReportController::class, 'exportPdf'])
    ->name('report.export.pdf');
});

Route::middleware(['auth','role:Admin'])
->prefix('dashboard')
->group(function () {

    // Dashboard
    Route::get('/admin',
        [DashboardController::class,'admin'])
        ->name('dashboard.admin');
    
    Route::resource('location', LocationController::class)
    ->except('show');

    Route::resource('users', UserController::class);

    // Returns
    Route::view('/returns','dashboard.admin.returns')
        ->name('admin.returns.index');

    // Category
    Route::resource('category', CategoryController::class)
        ->except('show');

    // Location
    // nanti
    // Route::resource('location', LocationController::class)->except('show');

    // Delete Inventory
    Route::delete(
        '/inventory/{inventory}',
        [ProductController::class,'destroy']
    )->name('dashboard.inventory.destroy');

    Route::get(
    '/borrow-request',
    [BorrowRequestController::class,'index']
)->name('borrow-request.index');

Route::get(
    '/borrow-request/{borrowing}',
    [BorrowRequestController::class,'show']
)->name('borrow-request.show');

Route::put(
    '/borrow-request/{borrowing}/approve',
    [BorrowRequestController::class,'approve']
)->name('borrow-request.approve');

Route::put(
    '/borrow-request/{borrowing}/reject',
    [BorrowRequestController::class,'reject']
)->name('borrow-request.reject');

});

Route::middleware(['auth'])
->prefix('dashboard')
->group(function () {

    Route::get(
        '/borrow-request',
        [BorrowRequestController::class,'index']
    )->name('borrow-request.index');

    Route::get(
        '/borrow-request/{borrowing}',
        [BorrowRequestController::class,'show']
    )->name('borrow-request.show');

    Route::get('/report', [ReportController::class,'index'])
    ->name('report.index');

Route::get('/report/export/excel', [ReportController::class,'exportExcel'])
    ->name('report.export.excel');

Route::get('/report/export/pdf', [ReportController::class,'exportPdf'])
    ->name('report.export.pdf');

    // ADMIN ONLY
    Route::middleware('role:Admin')->group(function(){

        Route::patch(
            '/borrow-request/{borrowing}/approve',
            [BorrowRequestController::class,'approve']
        )->name('borrow-request.approve');

        Route::patch(
            '/borrow-request/{borrowing}/reject',
            [BorrowRequestController::class,'reject']
        )->name('borrow-request.reject');

    });

});

Route::middleware(['auth','role:Admin,Staff'])
    ->prefix('dashboard')
    ->group(function () {

        Route::get(
            '/stock-monitoring',
            [StockController::class,'index']
        )->name('stock.index');

});

Route::middleware(['auth','role:Manager'])
->prefix('dashboard/manager')
->group(function(){

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/manager',
        [ManagerDashboardController::class,'index']
    )->name('dashboard.manager');

    /*
    |--------------------------------------------------------------------------
    | Inventory
    |--------------------------------------------------------------------------
    */

    Route::get(
    '/inventory',
    [ProductController::class,'index']
)->name('manager.inventory.index');

    Route::get(
        '/inventory/{inventory}',
        [ProductController::class,'show']
    )->name('manager.inventory.show');

    /*
    |--------------------------------------------------------------------------
    | Borrow Request
    |--------------------------------------------------------------------------
    */

     Route::get('/borrow-request',
        [BorrowRequestController::class,'index'])
        ->name('manager.borrow-request.index');

    Route::get('/borrow-request/{borrowing}',
        [BorrowRequestController::class,'show'])
        ->name('manager.borrow-request.show');

    /*
    |--------------------------------------------------------------------------
    | Stock
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/stock-monitoring',
        [StockController::class,'index']
    )->name('manager.stock.index');

    /*
    |--------------------------------------------------------------------------
    | Report
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/report',
        [ReportController::class,'index']
    )->name('manager.report.index');

    Route::get(
        '/report/export/pdf',
        [ReportController::class,'exportPdf']
    )->name('manager.report.pdf');

    Route::get(
        '/report/export/excel',
        [ReportController::class,'exportExcel']
    )->name('manager.report.excel');

});

Route::get('/debug-env', function () {
    return response()->json([
        'app_key_set' => !empty(config('app.key')),
        'session_driver' => config('session.driver'),
        'session_domain' => config('session.domain'),
        'session_secure' => config('session.secure'),
        'app_url' => config('app.url'),
    ]);
});

use Illuminate\Support\Facades\Session;
Route::get('/session-test', function () {

    Session::put('foo', 'bar');

    return response()->json([
        'id' => Session::getId(),
        'foo' => Session::get('foo'),
        'started' => Session::isStarted(),
        'has_cookie' => request()->hasCookie(config('session.cookie')),
    ]);
});

require __DIR__.'/auth.php';