@extends('layouts.dashboard')

@section('title','Borrow Asset')

@section('content')

<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-black mb-8">
        Borrow Asset
    </h1>

    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

@foreach($products as $product)

<div class="bg-white rounded-3xl shadow-lg p-6">

    <div class="h-48 bg-slate-100 rounded-2xl flex items-center justify-center mb-5">

        @if($product->image)

            <img
                src="{{ asset('storage/'.$product->image) }}"
                class="w-full h-full object-cover rounded-2xl">

        @else

            <i class="fa-solid fa-box text-6xl text-slate-300"></i>

        @endif

    </div>

    <h2 class="text-xl font-bold">

        {{ $product->name }}

    </h2>

    <p class="text-slate-500">

        {{ $product->code }}

    </p>

    <div class="mt-4 space-y-2 text-sm">

        <p>

            Category :
            <b>{{ $product->category->name }}</b>

        </p>

        <p>

            Location :
            <b>{{ $product->location->name }}</b>

        </p>

        <p>

            Stock :
            <b>{{ $product->stock }}</b>

        </p>

    </div>

    <a
        href="{{ route('borrow.create', $product) }}"
        class="mt-6 block text-center py-3 rounded-xl
        bg-gradient-to-r from-pink-500 to-purple-600
        text-white font-semibold">

        Borrow

    </a>

</div>

@endforeach

    </div>

</div>

@endsection