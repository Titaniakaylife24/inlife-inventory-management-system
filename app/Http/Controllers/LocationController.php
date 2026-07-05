<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $locations = Location::when($search, function ($query) use ($search) {

                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");

            })
            ->withCount('products')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('dashboard.location.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.location.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:locations,name',
            'description' => 'nullable|string|max:500',
        ]);

        Location::create($validated);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('dashboard.location.edit', compact('location'));
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Location $location)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:locations,name,' . $location->id,
            'description' => 'nullable|string|max:500',
        ]);

        $location->update($validated);

        return redirect()
            ->route('location.index')
            ->with('success', 'Location updated successfully.');
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Location $location)
    {
        // Cegah hapus jika masih dipakai asset
        if ($location->products()->count() > 0) {

            return redirect()
                ->route('location.index')
                ->with('error', 'Location cannot be deleted because it is still used by inventory.');

        }

        $location->delete();

        return redirect()
            ->route('location.index')
            ->with('success', 'Location deleted successfully.');
    }
}