<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class ReturnController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('product')
            ->where('user_id', Auth::id())
            ->where('status', 'Approved')
            ->get();

        return view(
            'dashboard.return.index',
            compact('borrowings')
        );
    }

    public function store(Borrowing $borrowing)
    {
        $borrowing->update([

            'status' => 'Returned',

            'actual_return_date' => now(),

        ]);

        return back()->with(
            'success',
            'Return request submitted successfully.'
        );
    }
}