<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class StockController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;
    $status = $request->status;
    $category = $request->category;

    $query = Product::with('category');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('code', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%");
        });
    }

    if ($category) {
        $query->where('category_id', $category);
    }

    if ($status == 'low') {
        $query->whereColumn('stock', '<=', 'minimum_stock')
              ->where('stock', '>', 0);
    }

    if ($status == 'healthy') {
        $query->whereColumn('stock', '>', 'minimum_stock');
    }

    if ($status == 'empty') {
        $query->where('stock', 0);
    }

    $products = $query->latest()
        ->paginate(10)
        ->withQueryString();

    return view('dashboard.stock.index',[
        'products'      => $products,
        'categories'    => Category::orderBy('name')->get(),

        'totalAssets'   => Product::count(),

        'healthyStock'  => Product::whereColumn('stock','>','minimum_stock')->count(),

        'lowStock'      => Product::whereColumn('stock','<=','minimum_stock')
                            ->where('stock','>',0)
                            ->count(),

        'emptyStock'    => Product::where('stock',0)->count(),
    ]);
}
}
