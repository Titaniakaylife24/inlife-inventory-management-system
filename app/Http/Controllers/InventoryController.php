<?php

namespace App\Http\Controllers;

use App\Models\Asset;

class InventoryController extends Controller
{
    public function index()
    {
        $assets = Asset::with('category')
                    ->latest()
                    ->paginate(10);

        return view('dashboard.inventory.index', compact('assets'));
    }
}