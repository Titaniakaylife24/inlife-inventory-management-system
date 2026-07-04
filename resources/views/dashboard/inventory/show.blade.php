@extends('layouts.dashboard')

@section('title','Asset Detail')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-black text-slate-800">
                Asset Detail
            </h1>

            <p class="text-slate-500 mt-1">
                Detail informasi inventaris perusahaan.
            </p>

        </div>

        <div class="flex gap-3">

    @if(in_array(auth()->user()->role->name, ['Admin', 'Staff']))
        <a
            href="{{ route('dashboard.inventory.edit', $product) }}"
            class="px-5 py-3 rounded-xl bg-amber-500 hover:bg-amber-600 text-white transition">

            <i class="fa-solid fa-pen mr-2"></i>
            Edit
        </a>
    @endif

    <a
        href="{{ route('dashboard.inventory.index') }}"
        class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

        <i class="fa-solid fa-arrow-left mr-2"></i>
        Back
    </a>

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