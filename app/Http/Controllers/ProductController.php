<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $products = Product::with(['category', 'location'])
            ->when($search, function ($query) use ($search) {
                $query->where('code', 'like', "%{$search}%")
                      ->orWhere('name', 'like', "%{$search}%")
                      ->orWhere('brand', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.inventory.index', compact('products', 'search'));
    }

    public function create()
    {
        return view('dashboard.inventory.create', [
            'categories' => Category::orderBy('name')->get(),
            'locations'  => Location::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'location_id'   => 'required|exists:locations,id',
            'code'          => 'required|string|max:30|unique:products,code',
            'serial_number' => 'nullable|string|max:100',
            'name'          => 'required|string|max:255',
            'brand'         => 'nullable|string|max:100',
            'unit'          => 'required|string|max:30',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'stock'         => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'condition'     => 'required|in:Good,Fair,Damaged,Lost',
            'status'        => 'required|in:Available,Borrowed,Maintenance',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request
                ->file('image')
                ->store('products', 'public');
        }

        Product::create($validated);

        return redirect()
            ->route('dashboard.inventory.index')
            ->with('success', 'Asset berhasil ditambahkan.');
    }

    public function show(Product $inventory)
    {
        $inventory->load(['category', 'location']);

        return view('dashboard.inventory.show', [
            'product' => $inventory
        ]);
    }

    public function edit(Product $inventory)
    {
        return view('dashboard.inventory.edit', [
            'product'    => $inventory,
            'categories' => Category::orderBy('name')->get(),
            'locations'  => Location::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Product $inventory)
    {
        $validated = $request->validate([
            'category_id'   => 'required|exists:categories,id',
            'location_id'   => 'required|exists:locations,id',
            'code'          => 'required|max:30|unique:products,code,' . $inventory->id,
            'serial_number' => 'nullable|string|max:100',
            'name'          => 'required|string|max:255',
            'brand'         => 'nullable|string|max:100',
            'unit'          => 'required|string|max:30',
            'description'   => 'nullable|string',
            'stock'         => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'condition'     => 'required|in:Good,Fair,Damaged,Lost',
            'status'        => 'required|in:Available,Borrowed,Maintenance',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($inventory->image) {
                Storage::disk('public')->delete($inventory->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('products', 'public');
        }

        $inventory->update($validated);

        return redirect()
            ->route('dashboard.inventory.index')
            ->with('success', 'Asset berhasil diperbarui.');
    }

    public function destroy(Product $inventory)
{
    if (Auth::user()->role->name != 'Admin') {
        abort(403);
    }

    if ($inventory->image) {
        Storage::disk('public')->delete($inventory->image);
    }

    $inventory->delete();

    return redirect()
        ->route('dashboard.inventory.index')
        ->with('success','Asset berhasil dihapus.');
}
}