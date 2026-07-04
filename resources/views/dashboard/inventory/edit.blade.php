@extends('layouts.dashboard')

@section('title', 'Edit Asset')

@section('content')

<div class="max-w-6xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-black text-slate-800">
                Edit Asset
            </h1>

            <p class="text-slate-500 mt-2">
                Perbarui informasi inventaris perusahaan.
            </p>

        </div>

        <a
            href="{{ route('inventory.index') }}"
            class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">

            <i class="fa-solid fa-arrow-left mr-2"></i>

            Back

        </a>

    </div>

    {{-- Validation Error --}}
    @if ($errors->any())

    <div class="mb-6 rounded-2xl bg-red-100 border border-red-200 p-5">

        <h3 class="font-bold text-red-700 mb-3">

            Terdapat kesalahan.

        </h3>

        <ul class="list-disc ml-6 text-red-600">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

    @endif

    {{-- Form --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <form
            action="{{ route('inventory.update',$product) }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @method('PUT')

            @include('dashboard.inventory._form')

        </form>

    </div>

</div>

@endsection