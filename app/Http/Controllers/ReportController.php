<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Exports\InventoryReportExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $category = $request->category;
        $status = $request->status;

        $query = Product::with('category');

        // Search
        if ($search) {
            $query->where(function ($q) use ($search) {

                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%");

            });
        }

        // Category
        if ($category) {
            $query->where('category_id', $category);
        }

        // Status
        if ($status) {
            $query->where('status', $status);
        }

        $products = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.staff.report.index', [

            'products' => $products,

            'categories' => Category::orderBy('name')->get(),

            'totalAssets' => Product::count(),

            'availableAssets' => Product::where('status', 'Available')->count(),

            'borrowedAssets' => Product::where('status', 'Borrowed')->count(),

            'lowStock' => Product::whereColumn('stock', '<=', 'minimum_stock')
                                ->where('stock', '>', 0)
                                ->count(),

        ]);
    }

    public function exportExcel(Request $request)
{
    return Excel::download(
        new InventoryReportExport($request),
        'Inventory_Report_' . now()->format('Y-m-d') . '.xlsx'
    );
}

public function exportPdf(Request $request)
{
    $query = Product::with(['category', 'location']);

    // Search
    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('code', 'like', "%{$search}%")
              ->orWhere('name', 'like', "%{$search}%")
              ->orWhere('brand', 'like', "%{$search}%");

        });

    }

    // Category
    if ($request->filled('category')) {

        $query->where('category_id', $request->category);

    }

    // Status
    if ($request->filled('status')) {

        $query->where('status', $request->status);

    }

    $products = $query->orderBy('name')->get();

    $pdf = Pdf::loadView(
        'dashboard.staff.report.pdf',
        compact('products')
    )->setPaper('a4', 'landscape');

    return $pdf->download(
        'Inventory_Report_' . now()->format('Y-m-d') . '.pdf'
    );
}


}