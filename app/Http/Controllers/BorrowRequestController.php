<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | List Borrow Requests
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = Borrowing::with([
            'user',
            'product',
            'approver'
        ]);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('borrow_code', 'like', "%{$search}%")
                    ->orWhere('borrower_name', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($qq) use ($search) {
                        $qq->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('product', function ($qq) use ($search) {
                        $qq->where('name', 'like', "%{$search}%");
                    });

            });
        }

        // Filter Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $borrowings = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $data = [

    'borrowings' => $borrowings,

    'totalRequest' => Borrowing::count(),

    'pending' => Borrowing::where('status','Pending')->count(),

    'approved' => Borrowing::where('status','Approved')->count(),

    'rejected' => Borrowing::where('status','Rejected')->count(),

    'returned' => Borrowing::where('status','Returned')->count(),

];

if(auth()->user()->role->name == 'Manager'){

    return view(
        'dashboard.manager.borrow-request.index',
        $data
    );

}

return view(
    'dashboard.borrow-request.index',
    $data
);
    }

    /*
    |--------------------------------------------------------------------------
    | Detail Borrow Request
    |--------------------------------------------------------------------------
    */

    public function show(Borrowing $borrowing)
    {
        $borrowing->load([
        'user',
        'product.category',
        'product.location',
        'approver'
        ]);

        if(auth()->user()->role->name == 'Manager'){

        return view(
            'dashboard.manager.borrow-request.show',
            compact('borrowing')
        );

    }

    return view(
        'dashboard.borrow-request.show',
        compact('borrowing')
    );

    }

    /*
    |--------------------------------------------------------------------------
    | Approve Request (Admin Only)
    |--------------------------------------------------------------------------
    */

    public function approve(Borrowing $borrowing)
    {
        // Admin Only
        if (Auth::user()->role->name != 'Admin') {

            abort(403);

        }

        // Sudah diproses
        if ($borrowing->status != 'Pending') {

            return back()->with(
                'error',
                'This request has already been processed.'
            );

        }

        $product = $borrowing->product;

        // Stock tidak cukup
        if ($product->stock < $borrowing->quantity) {

            return back()->with(
                'error',
                'Insufficient stock.'
            );

        }

        // Approve
        $borrowing->update([

            'status' => 'Approved',

            'approved_by' => Auth::id(),

        ]);

        // Kurangi stock
        $product->decrement(
            'stock',
            $borrowing->quantity
        );

        // Update status inventory
        if ($product->stock <= 0) {

            $product->update([
                'status' => 'Borrowed'
            ]);

        }

        return back()->with(
            'success',
            'Borrow request approved successfully.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Reject Request (Admin Only)
    |--------------------------------------------------------------------------
    */

    public function reject(Borrowing $borrowing)
    {
        // Admin Only
        if (Auth::user()->role->name != 'Admin') {

            abort(403);

        }

        if ($borrowing->status != 'Pending') {

            return back()->with(
                'error',
                'This request has already been processed.'
            );

        }

        $borrowing->update([

            'status' => 'Rejected',

            'approved_by' => Auth::id(),

        ]);

        return back()->with(
            'success',
            'Borrow request rejected successfully.'
        );
    }
}