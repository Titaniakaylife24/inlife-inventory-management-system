<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Borrowing;

class DashboardController extends Controller
{
    public function index(): RedirectResponse
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403, 'Role tidak ditemukan.');
        }

        return match ($user->role->name) {
            'Admin'    => redirect()->route('dashboard.admin'),
            'Staff'    => redirect()->route('dashboard.staff'),
            'Manager'  => redirect()->route('dashboard.manager'),
            'Employee' => redirect()->route('dashboard.employee'),
            default    => abort(403),
        };

    }

    public function staff()
{
    $totalAssets = Product::count();

    $availableAssets = Product::where('status', 'Available')->count();

    $maintenanceAssets = Product::where('status', 'Maintenance')->count();

    $lowStock = Product::whereColumn('stock', '<=', 'minimum_stock')->count();

    $recentProducts = Product::latest()
        ->take(5)
        ->get();

    $borrowRequests = Borrowing::latest()
        ->take(5)
        ->get();

    // TAMBAHKAN INI
    $lowStockProducts = Product::whereColumn('stock', '<=', 'minimum_stock')
        ->take(5)
        ->get();

    return view('dashboard.staff', compact(
        'totalAssets',
        'availableAssets',
        'maintenanceAssets',
        'lowStock',
        'recentProducts',
        'borrowRequests',
        'lowStockProducts'
    ));
}
}