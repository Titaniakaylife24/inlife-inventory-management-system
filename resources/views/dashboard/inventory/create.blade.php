@extends('layouts.dashboard')

@section('title','Add Asset')

@section('content')

<div class="max-w-6xl mx-auto">

    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-3xl font-bold text-slate-800">
                Add New Asset
            </h1>

            <p class="text-slate-500 mt-1">
                Tambahkan inventaris baru ke sistem.
            </p>
        </div>

        <a href="{{ route('dashboard.inventory.index') }}"
            class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 transition">
            ← Back
        </a>

    </div>

    @if ($errors->any())
        <div class="mb-6 rounded-2xl border border-red-200 bg-red-50 p-5">
            <h3 class="font-semibold text-red-600 mb-2">
                Terjadi kesalahan:
            </h3>

            <ul class="list-disc pl-5 text-red-600 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-3xl shadow p-8">

        <form
            action="{{ route('dashboard.inventory.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @include('dashboard.inventory._form')

        </form>

    </div>

</div>

@endsection