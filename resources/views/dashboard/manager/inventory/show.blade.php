@extends('layouts.dashboard')

@section('title','Asset Detail')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row justify-between gap-5">

    <div>

        <p class="text-fuchsia-600 font-semibold uppercase tracking-wider">
            Executive Overview
        </p>

        <h1 class="text-4xl font-black text-slate-800 mt-1">

            {{ $product->name }}

        </h1>

        <p class="text-slate-500 mt-2">

            Asset Code :
            <span class="font-semibold">
                {{ $product->code }}
            </span>

        </p>

    </div>

    <div>

    <a
        href="{{ route('manager.inventory.index') }}"
        class="inline-flex items-center gap-2
               px-4 py-2.5
               rounded-xl
               bg-slate-900
               hover:bg-slate-800
               text-white
               font-medium
               transition">

        <i class="fa-solid fa-arrow-left"></i>

        <span>Back</span>

    </a>

</div>

</div>

<div class="grid md:grid-cols-4 gap-5">

<div class="bg-white rounded-3xl shadow p-6">

<h3 class="text-slate-500 text-sm">

Current Status

</h3>

<p class="font-bold text-xl mt-2">

{{ $product->status }}

</p>

</div>

<div class="bg-white rounded-3xl shadow p-6">

<h3 class="text-slate-500 text-sm">

Condition

</h3>

<p class="font-bold text-xl mt-2">

{{ $product->condition }}

</p>

</div>

<div class="bg-white rounded-3xl shadow p-6">

<h3 class="text-slate-500 text-sm">

Current Stock

</h3>

<p class="font-bold text-xl mt-2">

{{ $product->stock }}

</p>

</div>

<div class="bg-white rounded-3xl shadow p-6">

<h3 class="text-slate-500 text-sm">

Minimum Stock

</h3>

<p class="font-bold text-xl mt-2">

{{ $product->minimum_stock }}

</p>

</div>

</div>

    {{-- Content --}}
    <div class="grid lg:grid-cols-3 gap-8">

        {{-- LEFT --}}
        <div>

            <div class="bg-white rounded-3xl shadow p-6">

                @if($product->image)

                    <img
                        src="{{ asset('storage/'.$product->image) }}"
                        class="w-full h-80 object-cover rounded-2xl">

                @else

                    <div
                        class="h-80 rounded-2xl bg-slate-100 flex items-center justify-center">

                        <i class="fa-solid fa-image text-7xl text-slate-300"></i>

                    </div>

                @endif

            </div>

        </div>

        {{-- RIGHT --}}
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl shadow p-8">

            <h2 class="text-2xl font-bold mb-8">

Asset Information

</h2>

                <div class="flex justify-between items-start">

                    <div>

                        <h2 class="text-3xl font-black text-slate-800">

                            {{ $product->name }}

                        </h2>

                        <p class="text-slate-500 mt-2">

                            {{ $product->code }}

                        </p>

                    </div>

                    {{-- Status --}}
                    @if($product->status=='Available')

                        <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                            Available

                        </span>

                    @elseif($product->status=='Borrowed')

                        <span class="px-4 py-2 rounded-full bg-amber-100 text-amber-700 font-semibold">

                            Borrowed

                        </span>

                    @else

                        <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                            Maintenance

                        </span>

                    @endif

                </div>

                <hr class="my-8">

                <div class="grid md:grid-cols-2 gap-6">

                    <div>

                        <label class="text-slate-400 text-sm">
                            Category
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->category->name }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Location
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->location->name }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Brand
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->brand }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Serial Number
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->serial_number ?: '-' }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Unit
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->unit }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Stock
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->stock }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Minimum Stock
                        </label>

                        <p class="font-semibold text-lg">

                            {{ $product->minimum_stock }}

                        </p>

                    </div>

                    <div>

                        <label class="text-slate-400 text-sm">
                            Condition
                        </label>

                        @if($product->condition=='Good')

                            <span class="inline-block mt-2 px-3 py-1 rounded-full bg-green-100 text-green-700">

                                Good

                            </span>

                        @elseif($product->condition=='Fair')

                            <span class="inline-block mt-2 px-3 py-1 rounded-full bg-yellow-100 text-yellow-700">

                                Fair

                            </span>

                        @elseif($product->condition=='Damaged')

                            <span class="inline-block mt-2 px-3 py-1 rounded-full bg-red-100 text-red-700">

                                Damaged

                            </span>

                        @else

                            <span class="inline-block mt-2 px-3 py-1 rounded-full bg-slate-100 text-slate-700">

                                Lost

                            </span>

                        @endif

                    </div>

                </div>

                <hr class="my-8">

<h2 class="text-2xl font-bold mb-6">

Operational Information

</h2>

<div class="grid md:grid-cols-2 gap-6 mb-8">

<div>

<label class="text-slate-400 text-sm">
Created At
</label>

<p class="font-semibold">

{{ $product->created_at->format('d M Y') }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">
Last Updated
</label>

<p class="font-semibold">

{{ $product->updated_at->format('d M Y') }}

</p>

</div>

</div>

                <hr class="my-8">
                
                <hr class="my-8">

<h2 class="text-2xl font-bold mb-6">

Inventory Insight

</h2>

@if($product->stock <= $product->minimum_stock)

<div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200">

⚠ Stock level has reached the minimum threshold. Procurement is recommended.

</div>

@else

<div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200">

✅ Stock level is sufficient for current operational needs.

</div>

@endif

@if($product->condition == 'Damaged')

<div class="mb-4 p-4 rounded-xl bg-red-50 border border-red-200">

⚠ Asset requires maintenance or replacement.

</div>

@elseif($product->condition == 'Fair')

<div class="mb-4 p-4 rounded-xl bg-yellow-50 border border-yellow-200">

⚠ Asset condition should be monitored regularly.

</div>

@else

<div class="mb-4 p-4 rounded-xl bg-green-50 border border-green-200">

✅ Asset condition is in excellent shape.

</div>

@endif

@if($product->status=='Borrowed')

<div class="mb-6 p-4 rounded-xl bg-amber-50 border border-amber-200">

📦 Asset is currently borrowed by an employee.

</div>

@elseif($product->status=='Maintenance')

<div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200">

🛠 Asset is currently under maintenance.

</div>

@else

<div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200">

✅ Asset is available for operational use.

</div>

@endif


                <div>

                    <label class="text-slate-400 text-sm">

                        Description

                    </label>

                    <p class="mt-3 leading-8 text-slate-700">

                        {{ $product->description ?: 'No description available.' }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection