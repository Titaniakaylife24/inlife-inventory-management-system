@extends('layouts.dashboard')

@section('title','Borrow Detail')

@section('content')

<div class="max-w-4xl mx-auto">

<div class="bg-white rounded-3xl shadow p-8">

<div class="flex justify-between items-center mb-8">

<h1 class="text-3xl font-black">

Borrow Detail

</h1>

<a href="{{ route('myborrow.index') }}"
class="px-5 py-2 rounded-xl bg-slate-200">

Back

</a>

</div>

<div class="grid grid-cols-2 gap-6">

<div>

<label class="text-slate-400">

Borrow Code

</label>

<p class="font-bold">

{{ $borrowing->borrow_code }}

</p>

</div>

<div>

<label class="text-slate-400">

Asset

</label>

<p class="font-bold">

{{ $borrowing->product->name }}

</p>

</div>

<div>

<label class="text-slate-400">

Quantity

</label>

<p>

{{ $borrowing->quantity }}

</p>

</div>

<div>

<label class="text-slate-400">

Borrow Date

</label>

<p>

{{ $borrowing->borrow_date }}

</p>

</div>

<div>

<label class="text-slate-400">

Expected Return

</label>

<p>

{{ $borrowing->expected_return_date }}

</p>

</div>

<div>

<label class="text-slate-400">

Status

</label>

<p>

{{ $borrowing->status }}

</p>

</div>

<div class="col-span-2">

<label class="text-slate-400">

Purpose

</label>

<p>

{{ $borrowing->purpose }}

</p>

</div>

@if($borrowing->notes)

<div class="col-span-2">

<label class="text-slate-400">

Notes

</label>

<p>

{{ $borrowing->notes }}

</p>

</div>

@endif

</div>

</div>

</div>

@endsection