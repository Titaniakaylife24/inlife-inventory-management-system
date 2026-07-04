@extends('layouts.dashboard')

@section('title','Return Asset')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    <div>

        <h1 class="text-3xl font-black">

            Return Asset

        </h1>

        <p class="text-slate-500 mt-2">

            Return borrowed company assets.

        </p>

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded-xl">

            {{ session('success') }}

        </div>

    @endif

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($borrowings as $borrow)

        <div class="bg-white rounded-3xl shadow-lg p-6">

            <h2 class="text-xl font-bold">

                {{ $borrow->product->name }}

            </h2>

            <p class="text-slate-500">

                {{ $borrow->product->code }}

            </p>

            <div class="mt-5 space-y-2">

                <div class="flex justify-between">

                    <span>Borrow Date</span>

                    <span>{{ $borrow->borrow_date }}</span>

                </div>

                <div class="flex justify-between">

                    <span>Return Date</span>

                    <span>{{ $borrow->expected_return_date }}</span>

                </div>

                <div class="flex justify-between">

                    <span>Quantity</span>

                    <span>{{ $borrow->quantity }}</span>

                </div>

            </div>

            <form
                method="POST"
                action="{{ route('return.store',$borrow) }}"
                class="mt-6">

                @csrf

                <button
                    class="w-full py-3 rounded-xl
                    bg-gradient-to-r
                    from-green-500
                    to-emerald-600
                    text-white">

                    Return Asset

                </button>

            </form>

        </div>

        @empty

        <div class="col-span-full">

            <div class="bg-white rounded-3xl shadow p-10 text-center">

                <i class="fa-solid fa-box-open text-6xl text-slate-300 mb-5"></i>

                <h2 class="text-2xl font-bold">

                    No Borrowed Assets

                </h2>

                <p class="text-slate-500 mt-2">

                    You don't have any approved borrowings.

                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection