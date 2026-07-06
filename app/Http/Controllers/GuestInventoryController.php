<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;

class GuestReportController extends Controller
{
    public function index()
    {
        return view('reports.index', [

            'totalBorrowings' => Borrowing::count(),

            'approved' => Borrowing::where('status', 'Approved')->count(),

            'pending' => Borrowing::where('status', 'Pending')->count(),

            'rejected' => Borrowing::where('status', 'Rejected')->count(),

            'returned' => Borrowing::where('status', 'Returned')->count(),

            'borrowings' => Borrowing::latest()
                ->take(6)
                ->get(),

        ]);
    }
}