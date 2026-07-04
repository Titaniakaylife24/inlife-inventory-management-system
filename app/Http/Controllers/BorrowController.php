<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Borrowing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    // Menampilkan semua asset
    public function index()
    {
        $products = Product::with(['category','location'])
            ->where('status','Available')
            ->where('stock','>',0)
            ->orderBy('name')
            ->get();

        return view('dashboard.borrow.index', compact('products'));
    }

    // Form borrow
    public function create(Product $product)
    {
        return view('dashboard.borrow.create', compact('product'));
    }

    // Simpan request
    public function store(Request $request)
    {
        $request->validate([
            'product_id'=>'required|exists:products,id',
            'quantity'=>'required|integer|min:1',
            'borrow_date'=>'required|date',
            'expected_return_date'=>'required|date|after_or_equal:borrow_date',
            'purpose'=>'required',
            'notes'=>'nullable'
        ]);

        Borrowing::create([

            'user_id'=>Auth::id(),

            'product_id'=>$request->product_id,

            'borrow_code'=>'BRW'.date('YmdHis'),

            'borrower_name'=>Auth::user()->name,

            'quantity'=>$request->quantity,

            'borrow_date'=>$request->borrow_date,

            'expected_return_date'=>$request->expected_return_date,

            'purpose'=>$request->purpose,

            'notes'=>$request->notes,

            'status'=>'Pending'

        ]);

        return redirect()
    ->route('borrow.index')
    ->with('success', 'Borrow request submitted successfully.');
    }
}