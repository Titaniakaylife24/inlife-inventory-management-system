<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    public function index()
{
    $totalAssets = Product::count();

    return $totalAssets;
}
}