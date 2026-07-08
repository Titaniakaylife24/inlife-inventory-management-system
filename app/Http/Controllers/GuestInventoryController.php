<?php

namespace App\Http\Controllers;

use App\Models\Product;

class GuestInventoryController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'category',
            'location'
        ])->latest()->paginate(8);

        return view('pages.inventory', [

            'products' => $products,

            'totalAssets' => Product::count(),

            'available' => Product::where(
                'status',
                'Available'
            )->count(),

            'borrowed' => Product::where(
                'status',
                'Borrowed'
            )->count(),

            'maintenance' => Product::where(
                'status',
                'Maintenance'
            )->count(),

        ]);
    }
}