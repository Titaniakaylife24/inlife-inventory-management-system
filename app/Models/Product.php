<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Borrowing;

class Product extends Model
{
    use HasFactory; // <-- WAJIB ADA

    protected $fillable = [
        'category_id',
        'location_id',
        'code',
        'serial_number',
        'name',
        'brand',
        'unit',
        'description',
        'image',
        'stock',
        'minimum_stock',
        'condition',
        'status',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function borrowingDetails(): HasMany
    {
        return $this->hasMany(BorrowingDetail::class);
    }

    public function borrowings()
{
    return $this->hasMany(Borrowing::class);
}
}