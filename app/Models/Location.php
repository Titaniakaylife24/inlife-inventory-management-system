<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function assets()
    {
        return $this->hasMany(Product::class);
    }
}