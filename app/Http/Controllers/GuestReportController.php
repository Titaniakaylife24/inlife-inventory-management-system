<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Borrowing;

class GuestReportController extends Controller
{
    public function index()
    {
        return view('reports.index', [

            // Inventory
            'totalAssets' => Product::count(),

            'borrowed' => Product::where('status','Borrowed')->count(),

            'maintenance' => Product::where('status','Maintenance')->count(),

            // Borrowing
            'totalBorrowings' => Borrowing::count(),

            'approved' => Borrowing::where('status','Approved')->count(),

            'pending' => Borrowing::where('status','Pending')->count(),

            'returned' => Borrowing::where('status','Returned')->count(),

        ]);
    }
}