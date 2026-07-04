<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Borrowing;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EmployeeDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $borrowed = Borrowing::where('user_id',$user->id)
            ->where('status','Approved')
            ->count();

        $pending = Borrowing::where('user_id',$user->id)
            ->where('status','Pending')
            ->count();

        $returned = Borrowing::where('user_id',$user->id)
            ->where('status','Returned')
            ->count();

        $available = Product::where('status','Available')
            ->sum('stock');

        $recentBorrowings = Borrowing::with('product')
            ->where('user_id',$user->id)
            ->latest()
            ->take(5)
            ->get();

        $upcomingReturn = Borrowing::with('product')
            ->where('user_id',$user->id)
            ->where('status','Approved')
            ->orderBy('expected_return_date')
            ->first();

        $latestAssets = Product::latest()
            ->take(5)
            ->get();

        return view('dashboard.employee',compact(
            'borrowed',
            'pending',
            'returned',
            'available',
            'recentBorrowings',
            'upcomingReturn',
            'latestAssets'
        ));
    }
}