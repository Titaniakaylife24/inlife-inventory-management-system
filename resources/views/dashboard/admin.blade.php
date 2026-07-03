@extends('layouts.dashboard')

@section('title', 'Admin Dashboard')

@section('content')

{{-- Welcome Banner --}}
<div
    class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-3xl p-8 text-white mb-8 shadow-lg">

    <h1 class="text-3xl font-bold">
        Welcome back, {{ Auth::user()->name }} 👋
    </h1>

    <p class="mt-2 text-pink-100">
        Manage your inventory efficiently and monitor all assets in one place.
    </p>

</div>

{{-- Stats --}}
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">

    @foreach ([
        ['Assets', '128'],
        ['Categories', '12'],
        ['Borrowed', '16'],
        ['Low Stock', '5']
    ] as [$label, $value])

        <div class="card-inlife hover:shadow-xl transition">

            <p class="text-slate-500 text-sm">
                {{ $label }}
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $value }}
            </h2>

        </div>

    @endforeach

</div>

{{-- Content Grid --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Recent Activity --}}
    <div class="xl:col-span-2 card-inlife">

        <h2 class="font-bold text-xl mb-6">
            Recent Activity
        </h2>

        <div class="space-y-4">

            @foreach ([
                'Laptop borrowed by Titania',
                'Printer added by Staff',
                'Projector returned',
                'Chair stock updated'
            ] as $activity)

                <div
                    class="p-4 rounded-2xl bg-slate-50 border border-slate-100">

                    {{ $activity }}

                </div>

            @endforeach

        </div>

    </div>

    {{-- Quick Overview --}}
    <div class="card-inlife">

        <h2 class="font-bold text-xl mb-6">
            Quick Overview
        </h2>

        <div class="space-y-5">

            <div class="flex justify-between">
                <span>Available Assets</span>
                <span class="font-bold text-green-500">97</span>
            </div>

            <div class="flex justify-between">
                <span>Borrowed Assets</span>
                <span class="font-bold text-yellow-500">16</span>
            </div>

            <div class="flex justify-between">
                <span>Damaged Assets</span>
                <span class="font-bold text-red-500">3</span>
            </div>

            <div class="flex justify-between">
                <span>Maintenance</span>
                <span class="font-bold text-blue-500">12</span>
            </div>

        </div>

    </div>

</div>

@endsection