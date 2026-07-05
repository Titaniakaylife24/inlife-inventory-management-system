@extends('layouts.dashboard')

@section('title', 'Inventory')

@section('content')

@if(session('success'))
<div class="mb-6 rounded-xl bg-green-100 border border-green-200 p-4 text-green-700">
    {{ session('success') }}
</div>
@endif

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-black text-slate-800">
                Inventory
            </h1>

            <p class="text-slate-500 mt-1">
                Manage company assets and inventory.
            </p>
        </div>

        @if(in_array(auth()->user()->role->name, ['Admin','Staff']))

<a href="{{ route('dashboard.inventory.create') }}"
class="inline-flex items-center gap-2 rounded-xl bg-fuchsia-600 px-5 py-3 text-white font-semibold hover:bg-fuchsia-700 transition">

<i class="fa-solid fa-plus"></i>
Add Asset

</a>

@endif

    </div>

    {{-- Search --}}
<div class="bg-white rounded-2xl shadow-sm p-5">

    <form method="GET">

        <div class="flex flex-col md:flex-row gap-3">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search code, asset name or brand..."
                class="flex-1 rounded-xl border border-slate-300 px-4 py-3
                focus:border-fuchsia-500
                focus:ring-2
                focus:ring-fuchsia-200
                outline-none">

            <button
                type="submit"
                class="rounded-xl bg-slate-900 px-6 py-3 text-white hover:bg-slate-800 transition">

                <i class="fa-solid fa-magnifying-glass mr-2"></i>
                Search

            </button>

            @if(request()->filled('search'))

            <a
                href="{{ route('dashboard.inventory.index') }}"
                class="rounded-xl bg-slate-200 px-6 py-3 text-slate-700 hover:bg-slate-300 transition text-center">

                <i class="fa-solid fa-rotate-left mr-2"></i>
                Reset

            </a>

            @endif

        </div>

    </form>

</div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                <tr class="text-left text-slate-700">

                    <th class="px-6 py-4">Image</th>

                    <th class="px-6 py-4">Code</th>

                    <th class="px-6 py-4">Asset</th>

                    <th class="px-6 py-4">Category</th>

                    <th class="px-6 py-4">Location</th>

                    <th class="px-6 py-4 text-center">Stock</th>

                    <th class="px-6 py-4">Condition</th>

                    <th class="px-6 py-4">Status</th>

                    <th class="px-6 py-4 text-center">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($products as $product)

                <tr class="border-t hover:bg-slate-50">

                    {{-- Image --}}
                    <td class="px-6 py-4">

                        @if($product->image)

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-16 h-16 rounded-xl object-cover">

                        @else

                        <div class="w-16 h-16 rounded-xl bg-slate-200 flex items-center justify-center">

                            <i class="fa-solid fa-image text-slate-400"></i>

                        </div>

                        @endif

                    </td>

                    {{-- Code --}}
                    <td class="px-6 py-4 font-semibold">

                        {{ $product->code }}

                    </td>

                    {{-- Name --}}
                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            {{ $product->name }}

                        </div>

                        <div class="text-sm text-slate-500">

                            {{ $product->brand }}

                        </div>

                    </td>

                    {{-- Category --}}
                    <td class="px-6 py-4">

                        {{ $product->category->name }}

                    </td>

                    {{-- Location --}}
                    <td class="px-6 py-4">

                        {{ $product->location->name }}

                    </td>

                    {{-- Stock --}}
                    <td class="px-6 py-4 text-center font-bold">

                        {{ $product->stock }}

                    </td>

                    {{-- Condition --}}
                    <td class="px-6 py-4">

                        @switch($product->condition)

                            @case('Good')
                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    Good
                                </span>
                            @break

                            @case('Fair')
                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                    Fair
                                </span>
                            @break

                            @case('Damaged')
                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                    Damaged
                                </span>
                            @break

                            @default
                                <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-sm">
                                    {{ $product->condition }}
                                </span>

                        @endswitch

                    </td>

                    {{-- Status --}}
                    <td class="px-6 py-4">

                        @if($product->status=='Available')

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Available
                            </span>

                        @elseif($product->status=='Borrowed')

                            <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-sm">
                                Borrowed
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Maintenance
                            </span>

                        @endif

                    </td>

                    {{-- Action --}}
                    <td class="px-6 py-4">

<div class="flex justify-center gap-2">

    {{-- Semua role --}}
    <a href="{{ route('dashboard.inventory.show',$product) }}"
    class="w-10 h-10 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center hover:bg-sky-200">

        <i class="fa-solid fa-eye"></i>

    </a>

    {{-- Admin & Staff boleh edit --}}
    @if(in_array(auth()->user()->role->name,['Admin','Staff']))

    <a href="{{ route('dashboard.inventory.edit',$product) }}"
    class="w-10 h-10 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-200">

        <i class="fa-solid fa-pen"></i>

    </a>

    @endif

    {{-- HANYA ADMIN boleh delete --}}
    @if(auth()->user()->role->name == 'Admin')

    <form
    action="{{ route('dashboard.inventory.destroy',$product) }}"
    method="POST">

        @csrf
        @method('DELETE')

        <button
        onclick="return confirm('Delete this asset?')"
        class="w-10 h-10 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">

            <i class="fa-solid fa-trash"></i>

        </button>

    </form>

    @endif

</div>

</td>
                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center py-12 text-slate-500">

                        No inventory data found.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="p-5 border-t">

            {{ $products->links() }}

        </div>

    </div>

</div>

@endsection