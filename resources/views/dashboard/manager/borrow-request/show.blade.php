@extends('layouts.dashboard')

@section('title','Borrow Request Detail')

@section('content')

<div class="space-y-8">

<div class="flex items-center justify-between">

    <div>

        <p class="uppercase tracking-widest text-fuchsia-600 font-bold">
            Executive Overview
        </p>

        <h1 class="text-4xl font-black text-slate-800 mt-2">
            Borrow Request Detail
        </h1>

        <p class="text-slate-500 mt-2">
            Monitor employee borrowing activities and approval progress.
        </p>

    </div>

    <a href="{{ route('manager.borrow-request.index') }}"
       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-slate-900 text-white hover:bg-slate-800 transition">

        <i class="fa-solid fa-arrow-left"></i>

        Back

    </a>

</div>

<div class="rounded-3xl bg-gradient-to-r from-indigo-600 via-purple-600 to-fuchsia-600 p-8 text-white shadow-xl">

    <h2 class="text-2xl font-bold">

        Executive Summary

    </h2>

    <p class="mt-3 leading-8 text-indigo-100">

        This page summarizes employee borrowing requests,
        asset utilization, approval history,
        and inventory impact.
        Managers can monitor operational performance
        without modifying company data.

    </p>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<div class="flex justify-between items-center">

<div>

<h2 class="text-2xl font-bold">

{{ $borrowing->borrow_code }}

</h2>

<p class="text-slate-500">

Borrow Request Code

</p>

</div>

<div>

@switch($borrowing->status)

@case('Pending')

<span class="px-5 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

Pending

</span>

@break

@case('Approved')

<span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

Approved

</span>

@break

@case('Rejected')

<span class="px-5 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

Rejected

</span>

@break

@case('Returned')

<span class="px-5 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">

Returned

</span>

@break

@endswitch

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Borrower Information

</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="text-slate-400 text-sm">

Borrower

</label>

<p class="font-semibold text-lg">

{{ $borrowing->borrower_name }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Employee Account

</label>

<p class="font-semibold text-lg">

{{ $borrowing->user->name }}

</p>

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Asset Information

</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="text-slate-400 text-sm">

Asset Name

</label>

<p class="font-semibold text-lg">

{{ $borrowing->product->name }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Asset Code

</label>

<p class="font-semibold text-lg">

{{ $borrowing->product->code }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Category

</label>

<p class="font-semibold text-lg">

{{ $borrowing->product->category->name }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Quantity

</label>

<p class="font-semibold text-lg">

{{ $borrowing->quantity }}

</p>

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Borrow Schedule

</h2>

<div class="grid md:grid-cols-3 gap-6">

<div>

<label class="text-slate-400 text-sm">

Borrow Date

</label>

<p class="font-semibold">

{{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Expected Return

</label>

<p class="font-semibold">

{{ \Carbon\Carbon::parse($borrowing->expected_return_date)->format('d M Y') }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Actual Return

</label>

<p class="font-semibold">

{{ $borrowing->actual_return_date
? \Carbon\Carbon::parse($borrowing->actual_return_date)->format('d M Y')
: '-' }}

</p>

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Approval Information

</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="text-slate-400 text-sm">

Approved By

</label>

<p class="font-semibold">

{{ $borrowing->approver?->name ?? '-' }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Current Status

</label>

<p class="font-semibold">

{{ $borrowing->status }}

</p>

</div>

</div>

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Inventory Impact

</h2>

<div class="grid md:grid-cols-2 gap-6">

<div>

<label class="text-slate-400 text-sm">

Remaining Stock

</label>

<p class="text-2xl font-black text-fuchsia-600">

{{ $borrowing->product->stock }}

</p>

</div>

<div>

<label class="text-slate-400 text-sm">

Minimum Stock

</label>

<p class="text-2xl font-black">

{{ $borrowing->product->minimum_stock }}

</p>

</div>

</div>

@if($borrowing->product->stock <= $borrowing->product->minimum_stock)

<div class="mt-6 rounded-xl bg-red-50 border border-red-200 p-4 text-red-700">

⚠ Stock has reached the minimum threshold.
Inventory replenishment should be considered.

</div>

@endif

</div>

<div class="bg-white rounded-3xl shadow p-8">

<h2 class="text-xl font-bold mb-6">

Additional Notes

</h2>

<p class="leading-8 text-slate-600">

{{ $borrowing->notes ?: 'No additional notes available.' }}

</p>

</div>

</div>

@endsection