@extends('layouts.dashboard')

@section('title','Inventory Report')

@section('content')

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

        <div>

            <p class="text-sm font-semibold tracking-widest uppercase text-fuchsia-600">
                INLIFE Inventory Management System
            </p>

            <h1 class="mt-2 text-3xl font-bold text-slate-800">
                Inventory Report
            </h1>

            <p class="mt-2 text-slate-500">
                View, filter and export inventory asset reports.
            </p>

        </div>

        <div class="flex gap-3">

            <a href="{{ route('report.export.excel', request()->query()) }}"
                class="inline-flex items-center gap-2 rounded-xl border border-green-600 px-5 py-3 text-green-600 hover:bg-green-600 hover:text-white transition">

                <i class="fa-solid fa-file-excel"></i>

                Export Excel

            </a>

            <a href="{{ route('report.export.pdf', request()->query()) }}"
                class="inline-flex items-center gap-2 rounded-xl border border-red-600 px-5 py-3 text-red-600 hover:bg-red-600 hover:text-white transition">

                <i class="fa-solid fa-file-pdf"></i>

                Export PDF

            </a>

        </div>

    </div>


    {{-- Summary --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <p class="text-slate-500 text-sm">
                Total Assets
            </p>

            <h2 class="mt-2 text-3xl font-bold">
                {{ $totalAssets }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <p class="text-slate-500 text-sm">
                Available
            </p>

            <h2 class="mt-2 text-3xl font-bold text-green-600">
                {{ $availableAssets }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <p class="text-slate-500 text-sm">
                Borrowed
            </p>

            <h2 class="mt-2 text-3xl font-bold text-amber-600">
                {{ $borrowedAssets }}
            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow-sm border p-6">

            <p class="text-slate-500 text-sm">
                Low Stock
            </p>

            <h2 class="mt-2 text-3xl font-bold text-red-600">
                {{ $lowStock }}
            </h2>

        </div>

    </div>


    {{-- Filter --}}
    <div class="bg-white rounded-2xl shadow-sm border p-6">

        <form method="GET">

            <div class="grid lg:grid-cols-5 gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search asset..."
                    class="rounded-xl border-slate-300">

                <select
                    name="category"
                    class="rounded-xl border-slate-300">

                    <option value="">
                        All Category
                    </option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(request('category')==$category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                <select
                    name="status"
                    class="rounded-xl border-slate-300">

                    <option value="">
                        All Status
                    </option>

                    <option value="Available"
                        @selected(request('status')=='Available')>

                        Available

                    </option>

                    <option value="Borrowed"
                        @selected(request('status')=='Borrowed')>

                        Borrowed

                    </option>

                    <option value="Maintenance"
                        @selected(request('status')=='Maintenance')>

                        Maintenance

                    </option>

                </select>

                <button
                    class="rounded-xl bg-fuchsia-600 text-white font-semibold hover:bg-fuchsia-700">

                    Search

                </button>

                <a
                    href="{{ route('report.index') }}"
                    class="rounded-xl border border-slate-300 flex items-center justify-center hover:bg-slate-100">

                    Reset

                </a>

            </div>

        </form>

    </div>

    {{-- Table --}}
    <table class="min-w-full text-sm">

    <thead class="bg-slate-100 border-b">

        <tr>

            <th class="px-6 py-4 text-left font-semibold text-slate-700">Image</th>

            <th class="px-6 py-4 text-left font-semibold text-slate-700">Code</th>

            <th class="px-6 py-4 text-left font-semibold text-slate-700">Asset Name</th>

            <th class="px-6 py-4 text-left font-semibold text-slate-700">Category</th>

            <th class="px-6 py-4 text-left font-semibold text-slate-700">Location</th>

            <th class="px-6 py-4 text-center font-semibold text-slate-700">Stock</th>

            <th class="px-6 py-4 text-center font-semibold text-slate-700">Condition</th>

            <th class="px-6 py-4 text-center font-semibold text-slate-700">Status</th>

            <th class="px-6 py-4 text-center font-semibold text-slate-700">Updated</th>

            <th class="px-6 py-4 text-center font-semibold text-slate-700">
    Action
</th>

        </tr>

    </thead>

    <tbody class="divide-y divide-slate-200">

    @forelse($products as $product)

        <tr class="hover:bg-slate-50 transition">

            {{-- Image --}}
            <td class="px-6 py-4">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-16 h-16 rounded-lg object-cover border">

                @else

                    <div class="w-16 h-16 rounded-lg border bg-slate-100 flex items-center justify-center">

                        <i class="fa-regular fa-image text-slate-400"></i>

                    </div>

                @endif

            </td>

            {{-- Code --}}
            <td class="px-6 py-4 font-semibold text-slate-700">

                {{ $product->code }}

            </td>

            {{-- Asset --}}
            <td class="px-6 py-4">

                <div class="font-semibold text-slate-800">

                    {{ $product->name }}

                </div>

                <div class="text-xs text-slate-500 mt-1">

                    {{ $product->brand }}

                </div>

            </td>

            {{-- Category --}}
            <td class="px-6 py-4">

                {{ $product->category->name }}

            </td>

            {{-- Location --}}
            <td class="px-6 py-4 whitespace-nowrap">

                {{ $product->location->name }}

            </td>

            {{-- Stock --}}
            <td class="px-6 py-4 text-center">

                @if($product->stock <= $product->minimum_stock)

                    <span class="px-3 py-1 rounded-lg bg-red-100 text-red-700 font-semibold">

                        {{ $product->stock }}

                    </span>

                @else

                    <span class="px-3 py-1 rounded-lg bg-green-100 text-green-700 font-semibold">

                        {{ $product->stock }}

                    </span>

                @endif

            </td>

            {{-- Condition --}}
            <td class="px-6 py-4 text-center">

                @php

                    $conditionColor = match($product->condition){

                        'Good' => 'bg-green-100 text-green-700',

                        'Fair' => 'bg-yellow-100 text-yellow-700',

                        'Damaged' => 'bg-red-100 text-red-700',

                        default => 'bg-slate-100 text-slate-700'

                    };

                @endphp

                <span class="px-3 py-1 rounded-lg {{ $conditionColor }}">

                    {{ $product->condition }}

                </span>

            </td>

            {{-- Status --}}
            <td class="px-6 py-4 text-center">

                @php

                    $statusColor = match($product->status){

                        'Available'=>'bg-green-100 text-green-700',

                        'Borrowed'=>'bg-yellow-100 text-yellow-700',

                        'Maintenance'=>'bg-red-100 text-red-700',

                        default=>'bg-slate-100 text-slate-700'

                    };

                @endphp

                <span class="px-3 py-1 rounded-lg {{ $statusColor }}">

                    {{ $product->status }}

                </span>

            </td>

            {{-- Updated --}}
            <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-slate-500">

                {{ $product->updated_at->format('d M Y') }}

                <br>

                {{ $product->updated_at->format('H:i') }}

            </td>

            <td class="px-6 py-4">

    <div class="flex justify-center gap-2">

        {{-- Detail --}}
        <a
            href="{{ route('dashboard.inventory.show',$product) }}"
            class="w-10 h-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center hover:bg-sky-600 hover:text-white transition">

            <i class="fa-solid fa-eye"></i>

        </a>

        {{-- Edit --}}
        <a
            href="{{ route('dashboard.inventory.edit',$product) }}"
            class="w-10 h-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center hover:bg-amber-500 hover:text-white transition">

            <i class="fa-solid fa-pen"></i>

        </a>

    </div>

</td>

        </tr>

    @empty

        <tr>

            <td colspan="9" class="py-16 text-center text-slate-500">

                No inventory report found.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

<div class="border-t bg-white px-6 py-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

    <div class="text-sm text-slate-500">

        Showing

        <span class="font-semibold">

            {{ $products->firstItem() ?? 0 }}

        </span>

        -

        <span class="font-semibold">

            {{ $products->lastItem() ?? 0 }}

        </span>

        of

        <span class="font-semibold">

            {{ $products->total() }}

        </span>

        assets

    </div>

    {{ $products->links() }}

</div>
@endsection