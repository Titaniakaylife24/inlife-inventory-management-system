<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;

class MyBorrowingController extends Controller
{
    public function index()
    {
        $borrowings = Borrowing::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'dashboard.myborrow.index',
            compact('borrowings')
        );
    }

    public function show(Borrowing $borrowing)
    {
        abort_if($borrowing->user_id != Auth::id(),403);

        return view(
            'dashboard.myborrow.show',
            compact('borrowing')
        );
    }
}