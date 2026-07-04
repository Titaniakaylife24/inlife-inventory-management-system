<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'approved_by',
        'quantity',
        'borrow_code',
        'borrower_name',
        'borrow_date',
        'expected_return_date',
        'actual_return_date',
        'purpose',
        'status',
        'notes',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    
}