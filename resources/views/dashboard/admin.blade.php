@extends('layouts.dashboard')

@section('title','Admin Dashboard')

@section('content')

<div class="space-y-8">

    {{-- ================= HEADER ================= --}}
    <div class="flex items-center justify-between">

        <div>

            <h1 class="text-4xl font-black text-slate-800">

                Admin Dashboard

            </h1>

            <p class="text-slate-500 mt-2">

                Monitor inventory, users, borrowing activities and company assets.

            </p>

        </div>

        <div class="text-right">

            <p class="text-sm text-slate-500">

                Today

            </p>

            <h2 class="text-xl font-bold">

                {{ now()->format('d F Y') }}

            </h2>

        </div>

    </div>


    {{-- ================= WELCOME CARD ================= --}}
    <div
    class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-fuchsia-600 via-purple-600 to-indigo-700 text-white shadow-xl p-10">

        <div class="absolute -top-24 -left-20 w-72 h-72 rounded-full bg-white/10 blur-3xl"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 rounded-full bg-pink-500/10 blur-3xl"></div>

        <div class="relative grid lg:grid-cols-2 gap-6 items-center">

            <div>

                <p class="text-pink-100 text-lg">

                    👋 Welcome Back

                </p>

                <h1 class="text-5xl font-black mt-3">

                    {{ Auth::user()->name }}

                </h1>

                <p class="mt-6 text-pink-100 leading-8">

                    You have full control over the InLife Inventory Management System.
                    Monitor inventory, manage users, approve borrow requests,
                    review reports, and keep every company asset under control.

                </p>

                <div class="flex gap-4 mt-8">

                    <a
                    href="{{ route('dashboard.inventory.index') }}"
                    class="rounded-xl bg-white px-6 py-3 text-fuchsia-700 font-bold hover:scale-105 transition">

                        Manage Inventory

                    </a>

                    <a
                    href="{{ route('borrow-request.index') }}"
                    class="rounded-xl border border-white/30 bg-white/10 backdrop-blur px-6 py-3 hover:bg-white/20 transition">

                        Borrow Requests

                    </a>

                </div>

            </div>

            <div class="hidden lg:flex justify-center">

                <img
                src="{{ asset('images/maskot_login.gif') }}"
                class="w-80 drop-shadow-2xl">

            </div>

        </div>

    </div>


    {{-- ================= STATISTIC CARDS ================= --}}
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Total Assets --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Total Assets

                    </p>

                    <h2 class="text-4xl font-black mt-2">

                        {{ $totalAssets }}

                    </h2>

                </div>

                <div class="text-5xl">

                    📦

                </div>

            </div>

        </div>

        {{-- Available --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Available

                    </p>

                    <h2 class="text-4xl font-black mt-2 text-green-600">

                        {{ $availableAssets }}

                    </h2>

                </div>

                <div class="text-5xl">

                    ✅

                </div>

            </div>

        </div>

        {{-- Borrowed --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Borrowed

                    </p>

                    <h2 class="text-4xl font-black mt-2 text-blue-600">

                        {{ $borrowedAssets }}

                    </h2>

                </div>

                <div class="text-5xl">

                    📋

                </div>

            </div>

        </div>

        {{-- Maintenance --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Maintenance

                    </p>

                    <h2 class="text-4xl font-black mt-2 text-red-600">

                        {{ $maintenanceAssets }}

                    </h2>

                </div>

                <div class="text-5xl">

                    🛠️

                </div>

            </div>

        </div>

        {{-- Low Stock --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Low Stock

                    </p>

                    <h2 class="text-4xl font-black mt-2 text-orange-600">

                        {{ $lowStock }}

                    </h2>

                </div>

                <div class="text-5xl">

                    ⚠️

                </div>

            </div>

        </div>

        {{-- Categories --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Categories

                    </p>

                    <h2 class="text-4xl font-black mt-2">

                        {{ $totalCategories }}

                    </h2>

                </div>

                <div class="text-5xl">

                    🗂️

                </div>

            </div>

        </div>

        {{-- Locations --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Locations

                    </p>

                    <h2 class="text-4xl font-black mt-2">

                        {{ $totalLocations }}

                    </h2>

                </div>

                <div class="text-5xl">

                    📍

                </div>

            </div>

        </div>

        {{-- Users --}}
        <div class="bg-white rounded-3xl shadow-lg p-6">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-slate-500">

                        Users

                    </p>

                    <h2 class="text-4xl font-black mt-2">

                        {{ $totalUsers }}

                    </h2>

                </div>

                <div class="text-5xl">

                    👥

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ================= DASHBOARD CHARTS ================= --}}
<div class="grid xl:grid-cols-2 gap-8 mt-10">

    {{-- Inventory Status --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-2xl font-bold text-slate-800">

                    Inventory Status

                </h2>

                <p class="text-slate-500 mt-1">

                    Asset distribution by status

                </p>

            </div>

        </div>

        <div class="h-72">
    <canvas id="inventoryChart"></canvas>
</div>

    </div>

    {{-- Borrow Statistics --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex items-center justify-between mb-6">

            <div>

                <h2 class="text-2xl font-bold text-slate-800">

                    Borrowing Overview

                </h2>

                <p class="text-slate-500 mt-1">

                    Monthly borrowing statistics

                </p>

            </div>

        </div>

        <div class="h-60">
    <canvas id="borrowChart"></canvas>
</div>

    </div>

</div>

{{-- ================= RECENT DATA ================= --}}

<div class="grid xl:grid-cols-2 gap-8 mt-8">

    {{-- Recent Borrow Requests --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                Recent Borrow Requests

            </h2>

            <p class="text-slate-500 mt-1">

                Latest borrowing activities.

            </p>

        </div>

        <div class="divide-y">

            @forelse($recentBorrowings as $borrow)

            <div class="px-8 py-5 flex justify-between items-center">

                <div>

                    <h3 class="font-semibold">

                        {{ $borrow->product->name }}

                    </h3>

                    <p class="text-sm text-slate-500">

                        {{ $borrow->user->name }}

                    </p>

                </div>

                <div>

                    @if($borrow->status=='Pending')

                        <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

                            Pending

                        </span>

                    @elseif($borrow->status=='Approved')

                        <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                            Approved

                        </span>

                    @elseif($borrow->status=='Rejected')

                        <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                            Rejected

                        </span>

                    @else

                        <span class="px-3 py-1 rounded-full bg-slate-100 text-slate-700 text-sm">

                            {{ $borrow->status }}

                        </span>

                    @endif

                </div>

            </div>

            @empty

            <div class="py-10 text-center text-slate-400">

                No borrow requests.

            </div>

            @endforelse

        </div>

    </div>



    {{-- Latest Assets --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                Latest Assets

            </h2>

            <p class="text-slate-500 mt-1">

                Recently added inventory.

            </p>

        </div>

        <div class="divide-y">

            @forelse($latestAssets as $asset)

            <div class="px-8 py-5 flex justify-between items-center">

                <div>

                    <h3 class="font-semibold">

                        {{ $asset->name }}

                    </h3>

                    <p class="text-sm text-slate-500">

                        {{ $asset->code }}

                    </p>

                </div>

                <span class="font-bold text-fuchsia-600">

                    Stock {{ $asset->stock }}

                </span>

            </div>

            @empty

            <div class="py-10 text-center text-slate-400">

                No asset found.

            </div>

            @endforelse

        </div>

    </div>

</div>



<div class="grid xl:grid-cols-2 gap-6 mt-6">

    {{-- Latest Users --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                New Users

            </h2>

        </div>

        <div class="divide-y">

            @foreach($latestUsers as $user)

            <div class="px-8 py-5 flex justify-between">

                <div>

                    <h3 class="font-semibold">

                        {{ $user->name }}

                    </h3>

                    <p class="text-sm text-slate-500">

                        {{ $user->email }}

                    </p>

                </div>

                <span class="text-fuchsia-600 font-semibold">

                    {{ $user->role->name }}

                </span>

            </div>

            @endforeach

        </div>

    </div>



    {{-- System Overview --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6">

            System Overview

        </h2>

        <div class="space-y-6">

            <div class="flex justify-between">

                <span>Total Assets</span>

                <span class="font-bold">

                    {{ $totalAssets }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Total Users</span>

                <span class="font-bold">

                    {{ $totalUsers }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Available Assets</span>

                <span class="font-bold text-green-600">

                    {{ $availableAssets }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Borrowed Assets</span>

                <span class="font-bold text-blue-600">

                    {{ $borrowedAssets }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Maintenance Assets</span>

                <span class="font-bold text-red-600">

                    {{ $maintenanceAssets }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Low Stock Assets</span>

                <span class="font-bold text-orange-600">

                    {{ $lowStock }}

                </span>

            </div>

        </div>

    </div>

</div>

{{-- ================= QUICK ACTIONS ================= --}}

<div class="grid xl:grid-cols-3 gap-6 mt-6">

    {{-- Quick Actions --}}
    <div class="bg-white rounded-3xl shadow-lg p-8">

        <h2 class="text-2xl font-bold mb-6">

            Quick Actions

        </h2>

        <div class="grid grid-cols-2 gap-4">

            <a href="{{ route('dashboard.inventory.create') }}"
                class="rounded-2xl bg-fuchsia-50 hover:bg-fuchsia-100 p-5 text-center transition">

                <div class="text-4xl">➕</div>

                <p class="font-semibold mt-3">

                    Add Asset

                </p>

            </a>

            <a href="{{ route('dashboard.inventory.index') }}"
                class="rounded-2xl bg-blue-50 hover:bg-blue-100 p-5 text-center transition">

                <div class="text-4xl">📦</div>

                <p class="font-semibold mt-3">

                    Inventory

                </p>

            </a>

            <a href="{{ route('borrow-request.index') }}"
                class="rounded-2xl bg-yellow-50 hover:bg-yellow-100 p-5 text-center transition">

                <div class="text-4xl">📋</div>

                <p class="font-semibold mt-3">

                    Borrow Requests

                </p>

            </a>

            <a href="{{ route('report.index') }}"
                class="rounded-2xl bg-green-50 hover:bg-green-100 p-5 text-center transition">

                <div class="text-4xl">📈</div>

                <p class="font-semibold mt-3">

                    Reports

                </p>

            </a>

        </div>

    </div>

    {{-- Low Stock --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                Low Stock Assets

            </h2>

        </div>

        <div class="divide-y">

            @forelse($lowStockAssets as $asset)

            <div class="px-8 py-5 flex justify-between">

                <div>

                    <h3 class="font-semibold">

                        {{ $asset->name }}

                    </h3>

                    <p class="text-sm text-slate-500">

                        {{ $asset->code }}

                    </p>

                </div>

                <span class="font-bold text-red-600">

                    {{ $asset->stock }}

                </span>

            </div>

            @empty

            <div class="py-10 text-center text-slate-400">

                No low stock assets.

            </div>

            @endforelse

        </div>

    </div>

    {{-- Maintenance --}}
    <div class="bg-white rounded-3xl shadow-lg overflow-hidden">

        <div class="px-8 py-6 border-b">

            <h2 class="text-2xl font-bold">

                Maintenance Assets

            </h2>

        </div>

        <div class="divide-y">

            @forelse($maintenanceAssetsList as $asset)

            <div class="px-8 py-5 flex justify-between">

                <div>

                    <h3 class="font-semibold">

                        {{ $asset->name }}

                    </h3>

                    <p class="text-sm text-slate-500">

                        {{ $asset->code }}

                    </p>

                </div>

                <span class="text-red-600 font-semibold">

                    Maintenance

                </span>

            </div>

            @empty

            <div class="py-10 text-center text-slate-400">

                No maintenance assets.

            </div>

            @endforelse

        </div>

    </div>

</div>

{{-- ================= ROLE DISTRIBUTION ================= --}}

<div class="bg-white rounded-3xl shadow-lg p-8 mt-8">

    <h2 class="text-2xl font-bold mb-6">

        User Distribution

    </h2>

    <div class="grid md:grid-cols-4 gap-6">

        @foreach($roleDistribution as $role=>$count)

        <div class="rounded-2xl bg-slate-50 p-6 text-center">

            <div class="text-4xl mb-3">

                👤

            </div>

            <h3 class="text-xl font-bold">

                {{ $count }}

            </h3>

            <p class="text-slate-500">

                {{ $role }}

            </p>

        </div>

        @endforeach

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const inventoryCtx = document.getElementById('inventoryChart');

new Chart(inventoryCtx, {
    type: 'doughnut',

    data: {
        labels: ['Available', 'Borrowed', 'Maintenance'],

        datasets: [{
            data: @json($chartStatus),

            backgroundColor: [
                '#22c55e',
                '#3b82f6',
                '#ef4444'
            ],

            borderColor: '#ffffff',
            borderWidth: 3,
            hoverOffset: 15
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    usePointStyle: true,
                    pointStyle: 'circle',
                    padding: 20,
                    font: {
                        size: 13
                    }
                }
            }
        },

        cutout: '70%'
    }
});

const borrowCtx = document.getElementById('borrowChart');

new Chart(borrowCtx, {
    type: 'bar',

    data: {
        labels: [
            'Jan','Feb','Mar','Apr','May','Jun',
            'Jul','Aug','Sep','Oct','Nov','Dec'
        ],

        datasets: [{
            label: 'Borrow Requests',

            data: @json($monthlyBorrow),

            backgroundColor: '#8b5cf6',
            borderRadius: 8,
            borderSkipped: false
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false,

        plugins: {
            legend: {
                display: false
            }
        },

        scales: {
            x: {
                grid: {
                    display: false
                }
            },

            y: {
                beginAtZero: true,

                ticks: {
                    stepSize: 1
                },

                grid: {
                    color: '#eeeeee'
                }
            }
        }
    }
});

</script>


@endsection

