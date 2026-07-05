<?php

namespace App\Http\Controllers;

use App\Models\Borrowing;
use Illuminate\Http\Request;

class BorrowRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = Borrowing::with(['user','product']);

        if($request->filled('search')){
            $query->where(function($q) use($request){
                $q->where('borrower_name','like','%'.$request->search.'%')
                  ->orWhereHas('product',function($qq) use($request){
                      $qq->where('name','like','%'.$request->search.'%');
                  });
            });
        }

        if($request->filled('status')){
            $query->where('status',$request->status);
        }

        $borrowings = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.borrow-request.index',[
            'borrowings'=>$borrowings,

            'totalRequest'=>Borrowing::count(),

            'pending'=>Borrowing::where('status','Pending')->count(),

            'approved'=>Borrowing::where('status','Approved')->count(),

            'returned'=>Borrowing::where('status','Returned')->count(),
        ]);
    }
}