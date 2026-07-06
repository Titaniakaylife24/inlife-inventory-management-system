<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Borrowing;

class ManagerDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.manager',[

            'totalAssets'=>Product::count(),

            'availableAssets'=>Product::where(
                'status',
                'Available'
            )->count(),

            'borrowedAssets'=>Product::where(
                'status',
                'Borrowed'
            )->count(),

            'maintenanceAssets'=>Product::where(
                'status',
                'Maintenance'
            )->count(),

            'lowStock'=>Product::whereColumn(
                'stock',
                '<=',
                'minimum_stock'
            )->where(
                'stock',
                '>',
                0
            )->count(),

            'recentBorrowings'=>Borrowing::with(
                ['user','product']
            )
            ->latest()
            ->take(5)
            ->get(),

            'lowStockProducts'=>Product::whereColumn(
                'stock',
                '<=',
                'minimum_stock'
            )
            ->take(5)
            ->get(),

            'categories'=>Category::withCount(
                'products'
            )->get(),

        ]);
    }
}