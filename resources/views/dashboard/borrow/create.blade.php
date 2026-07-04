@extends('layouts.dashboard')

@section('title','Borrow Asset')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-black text-slate-800">
                Borrow Asset
            </h1>

            <p class="text-slate-500 mt-2">
                Complete the form below to request this asset.
            </p>

        </div>

        <a href="{{ route('borrow.index') }}"
           class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Back

        </a>

    </div>

    <form method="POST"
          action="{{ route('borrow.store') }}">

        @csrf

        <input
            type="hidden"
            name="product_id"
            value="{{ $product->id }}">

        <div class="grid lg:grid-cols-3 gap-8">

            {{-- LEFT --}}
            <div>

                <div class="bg-white rounded-3xl shadow p-6">

                    @if($product->image)

                        <img
                            src="{{ asset('storage/'.$product->image) }}"
                            class="w-full h-72 object-cover rounded-2xl">

                    @else

                        <div
                            class="h-72 rounded-2xl bg-slate-100 flex items-center justify-center">

                            <i class="fa-solid fa-box-open text-6xl text-slate-300"></i>

                        </div>

                    @endif

                </div>

            </div>

            {{-- RIGHT --}}
            <div class="lg:col-span-2">

                <div class="bg-white rounded-3xl shadow p-8 space-y-6">

                    <div>

                        <h2 class="text-3xl font-black">

                            {{ $product->name }}

                        </h2>

                        <p class="text-slate-500">

                            {{ $product->code }}

                        </p>

                    </div>

                    <div class="grid md:grid-cols-2 gap-5">

                        <div>

                            <label class="text-slate-400 text-sm">
                                Category
                            </label>

                            <p class="font-semibold">
                                {{ $product->category->name }}
                            </p>

                        </div>

                        <div>

                            <label class="text-slate-400 text-sm">
                                Location
                            </label>

                            <p class="font-semibold">
                                {{ $product->location->name }}
                            </p>

                        </div>

                        <div>

                            <label class="text-slate-400 text-sm">
                                Available Stock
                            </label>

                            <p class="font-semibold text-green-600">
                                {{ $product->stock }} Unit
                            </p>

                        </div>

                        <div>

                            <label class="text-slate-400 text-sm">
                                Condition
                            </label>

                            <p class="font-semibold">
                                {{ $product->condition }}
                            </p>

                        </div>

                    </div>

                    <hr>

                    {{-- Quantity --}}
                    <div>

                        <label class="font-semibold">

                            Quantity

                        </label>

                        <input
                            type="number"
                            name="quantity"
                            min="1"
                            max="{{ $product->stock }}"
                            value="1"
                            class="mt-2 w-full rounded-xl border-slate-300">

                        @error('quantity')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    {{-- Borrow Date --}}
                    <div>

                        <label class="font-semibold">

                            Borrow Date

                        </label>

                        <input
                            type="date"
                            name="borrow_date"
                            value="{{ date('Y-m-d') }}"
                            class="mt-2 w-full rounded-xl border-slate-300">

                    </div>

                    {{-- Return Date --}}
                    <div>

                        <label class="font-semibold">

                            Expected Return Date

                        </label>

                        <input
                            type="date"
                            name="expected_return_date"
                            class="mt-2 w-full rounded-xl border-slate-300">

                    </div>

                    {{-- Purpose --}}
                    <div>

                        <label class="font-semibold">

                            Purpose

                        </label>

                        <select
                            name="purpose"
                            class="mt-2 w-full rounded-xl border-slate-300">

                            <option value="Operational">Operational</option>
                            <option value="Meeting">Meeting</option>
                            <option value="Training">Training</option>
                            <option value="Event">Event</option>
                            <option value="Other">Other</option>

                        </select>

                    </div>

                    {{-- Notes --}}
                    <div>

                        <label class="font-semibold">

                            Notes

                        </label>

                        <textarea
                            name="notes"
                            rows="4"
                            class="mt-2 w-full rounded-xl border-slate-300"
                            placeholder="Additional information..."></textarea>

                    </div>

                    {{-- Button --}}
                    <div class="flex gap-4 pt-4">

                        <a
                            href="{{ route('borrow.index') }}"
                            class="w-1/3 text-center py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="w-2/3 py-3 rounded-xl text-white font-bold bg-gradient-to-r from-pink-500 to-purple-600 hover:opacity-90 transition">

                            <i class="fa-solid fa-paper-plane mr-2"></i>

                            Submit Request

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </form>

</div>

@endsection