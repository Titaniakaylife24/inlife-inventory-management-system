<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Borrowing;
use App\Models\Category;
use App\Models\Location;
use App\Models\User;

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

public function admin()
{
    // =========================
    // Summary
    // =========================

    $totalAssets = Product::count();

    $availableAssets = Product::where('status','Available')->count();

    $borrowedAssets = Product::where('status','Borrowed')->count();

    $maintenanceAssets = Product::where('status','Maintenance')->count();

    $lowStock = Product::whereColumn('stock','<=','minimum_stock')->count();

    $totalCategories = Category::count();

    $totalLocations = Location::count();

    $totalUsers = User::count();

    $damagedAssets = Product::where('condition','Damaged')->count();


    // =========================
    // Latest Data
    // =========================

    $latestAssets = Product::latest()
        ->take(5)
        ->get();

    $latestUsers = User::with('role')
        ->latest()
        ->take(5)
        ->get();

    $recentBorrowings = Borrowing::with(['product','user'])
        ->latest()
        ->take(5)
        ->get();


    // =========================
    // Low Stock
    // =========================

    $lowStockAssets = Product::whereColumn('stock','<=','minimum_stock')
        ->latest()
        ->take(5)
        ->get();


    // =========================
    // Maintenance Asset
    // =========================

    $maintenanceAssetsList = Product::where('status','Maintenance')
        ->latest()
        ->take(5)
        ->get();


    // =========================
    // User Distribution
    // =========================

    $roleDistribution = User::with('role')
        ->get()
        ->groupBy(fn($user) => $user->role->name)
        ->map(fn($group) => $group->count());


    // =========================
    // Chart Status
    // =========================

    $chartStatus = [

        $availableAssets,

        $borrowedAssets,

        $maintenanceAssets,

    ];


    // =========================
    // Monthly Borrow Chart
    // =========================

    $monthlyBorrow = [];

    for ($i = 1; $i <= 12; $i++) {

        $monthlyBorrow[] = Borrowing::whereMonth('created_at',$i)
            ->whereYear('created_at',now()->year)
            ->count();

    }


    return view('dashboard.admin', compact(

        'totalAssets',
        'availableAssets',
        'borrowedAssets',
        'maintenanceAssets',
        'lowStock',
        'totalCategories',
        'totalLocations',
        'totalUsers',
        'damagedAssets',

        'latestAssets',
        'latestUsers',
        'recentBorrowings',

        'lowStockAssets',
        'maintenanceAssetsList',

        'roleDistribution',

        'chartStatus',
        'monthlyBorrow'

    ));
}

}