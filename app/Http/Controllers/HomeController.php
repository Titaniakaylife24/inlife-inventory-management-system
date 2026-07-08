<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
    {
        $totalAssets = Product::count();

        $borrowed = Product::where('status','Borrowed')->count();

        $lowStock = Product::whereColumn(
                'stock',
                '<=',
                'minimum_stock'
            )
            ->where('stock','>',0)
            ->count();

        $categories = Category::count();

        $locations = Location::count();

        $latestProducts = Product::latest()
            ->take(3)
            ->get();

        return view('home', compact(
            'totalAssets',
            'borrowed',
            'lowStock',
            'categories',
            'locations',
            'latestProducts'
        ));
    }
}