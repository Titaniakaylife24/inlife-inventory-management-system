@extends('layouts.dashboard')

@section('title','Borrow Request Detail')

@section('content')

@if(session('success'))
<div class="mb-6 rounded-xl bg-green-100 border border-green-200 p-4 text-green-700">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 rounded-xl bg-red-100 border border-red-200 p-4 text-red-700">
    {{ session('error') }}
</div>
@endif

<div class="max-w-7xl mx-auto space-y-8">

    {{-- Header --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-3xl font-black text-slate-800">

                Borrow Request Detail

            </h1>

            <p class="text-slate-500 mt-1">

                Detailed information about this borrowing request.

            </p>

        </div>

        <div class="flex gap-3">

            {{-- ADMIN --}}
            @if(auth()->user()->role->name=='Admin' && $borrowing->status=='Pending')

                <form
                    action="{{ route('borrow-request.approve',$borrowing) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        onclick="return confirm('Approve this request?')"
                        class="px-5 py-3 rounded-xl bg-green-600 hover:bg-green-700 text-white transition">

                        <i class="fa-solid fa-check mr-2"></i>

                        Approve

                    </button>

                </form>

                <form
                    action="{{ route('borrow-request.reject',$borrowing) }}"
                    method="POST">

                    @csrf
                    @method('PATCH')

                    <button
                        onclick="return confirm('Reject this request?')"
                        class="px-5 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white transition">

                        <i class="fa-solid fa-xmark mr-2"></i>

                        Reject

                    </button>

                </form>

            @endif

            <a
                href="{{ route('borrow-request.index') }}"
                class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

                <i class="fa-solid fa-arrow-left mr-2"></i>

                Back

            </a>

        </div>

    </div>

    {{-- Card --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex justify-between items-start">

            <div>

                <h2 class="text-3xl font-black text-slate-800">

                    {{ $borrowing->borrow_code }}

                </h2>

                <p class="text-slate-500 mt-2">

                    Borrow Code

                </p>

            </div>

            {{-- Status --}}
            @switch($borrowing->status)

                @case('Pending')

                <span class="px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                    Pending

                </span>

                @break

                @case('Approved')

                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                    Approved

                </span>

                @break

                @case('Rejected')

                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                    Rejected

                </span>

                @break

                @case('Returned')

                <span class="px-4 py-2 rounded-full bg-blue-100 text-blue-700 font-semibold">

                    Returned

                </span>

                @break

            @endswitch

        </div>

        <hr class="my-8">

        <div class="grid md:grid-cols-2 gap-8">

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

            <div>

                <label class="text-slate-400 text-sm">

                    Asset

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

            <div>

                <label class="text-slate-400 text-sm">

                    Borrow Date

                </label>

                <p class="font-semibold text-lg">

                    {{ \Carbon\Carbon::parse($borrowing->borrow_date)->format('d M Y') }}

                </p>

            </div>

            <div>

                <label class="text-slate-400 text-sm">

                    Expected Return

                </label>

                <p class="font-semibold text-lg">

                    {{ \Carbon\Carbon::parse($borrowing->expected_return_date)->format('d M Y') }}

                </p>

            </div>

            <div>

                <label class="text-slate-400 text-sm">

                    Actual Return

                </label>

                <p class="font-semibold text-lg">

                    {{ $borrowing->actual_return_date ? \Carbon\Carbon::parse($borrowing->actual_return_date)->format('d M Y') : '-' }}

                </p>

            </div>

            <div>

                <label class="text-slate-400 text-sm">

                    Purpose

                </label>

                <p class="font-semibold text-lg">

                    {{ $borrowing->purpose }}

                </p>

            </div>

            <div>

                <label class="text-slate-400 text-sm">

                    Approved By

                </label>

                <p class="font-semibold text-lg">

                    {{ $borrowing->approver?->name ?? '-' }}

                </p>

            </div>

            <div>

                <label class="text-slate-400 text-sm">

                    Remaining Stock

                </label>

                <p class="font-semibold text-lg">

                    {{ $borrowing->product->stock }}

                </p>

            </div>

        </div>

        <hr class="my-8">

        <div>

            <label class="text-slate-400 text-sm">

                Notes

            </label>

            <p class="mt-3 leading-8 text-slate-700">

                {{ $borrowing->notes ?: 'No additional notes.' }}

            </p>

        </div>

    </div>

</div>

@endsection