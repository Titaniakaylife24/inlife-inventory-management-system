@extends('layouts.dashboard')

@section('title','Manager Dashboard')

@section('content')

<div class="space-y-8">

    {{-- Welcome --}}
    @include('components.dashboard.welcome-card')

    {{-- Statistic Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        @include('components.dashboard.stat-card',[
            'title'=>'Total Assets',
            'value'=>$totalAssets,
            'icon'=>'📦',
            'color'=>'from-indigo-500 to-purple-600',
            'link'=>route('manager.inventory.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Available',
            'value'=>$availableAssets,
            'icon'=>'✅',
            'color'=>'from-green-500 to-emerald-600',
            'link'=>route('manager.inventory.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Borrowed',
            'value'=>$borrowedAssets,
            'icon'=>'📋',
            'color'=>'from-orange-500 to-amber-600',
            'link'=>route('manager.borrow-request.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Low Stock',
            'value'=>$lowStock,
            'icon'=>'⚠️',
            'color'=>'from-red-500 to-pink-600',
            'link'=>route('manager.stock.index')
        ])

    </div>

    {{-- Quick Action --}}
    @include('components.dashboard.quick-action-manager')

    <div class="grid xl:grid-cols-3 gap-6">

        {{-- Recent Borrow Requests --}}
        <div class="xl:col-span-2 bg-white rounded-3xl shadow p-6">

            <h2 class="text-xl font-bold mb-5">

                Recent Borrow Requests

            </h2>

            <table class="w-full">

                <thead>

                    <tr class="border-b text-slate-500">

                        <th class="pb-3 text-left">Employee</th>

                        <th>Asset</th>

                        <th>Borrow Date</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody class="divide-y">

                    @forelse($recentBorrowings as $borrow)

                        <tr>

                            <td class="py-4">

                                {{ $borrow->user->name }}

                            </td>

                            <td>

                                {{ $borrow->product->name }}

                            </td>

                            <td>

                                {{ $borrow->created_at->format('d M Y') }}

                            </td>

                            <td>

                                @if($borrow->status=='Pending')

                                    <span class="text-orange-600 font-semibold">

                                        Pending

                                    </span>

                                @elseif($borrow->status=='Approved')

                                    <span class="text-green-600 font-semibold">

                                        Approved

                                    </span>

                                @elseif($borrow->status=='Rejected')

                                    <span class="text-red-600 font-semibold">

                                        Rejected

                                    </span>

                                @else

                                    {{ $borrow->status }}

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="py-8 text-center text-slate-500">

                                No borrow requests found.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Right Side --}}
        <div class="space-y-6">

            {{-- Category Overview --}}
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="font-bold mb-5">

                    Inventory by Category

                </h2>

                @foreach($categories as $category)

                    <div class="mb-5">

                        <div class="flex justify-between">

                            <span>

                                {{ $category->name }}

                            </span>

                            <span>

                                {{ $category->products_count }}

                            </span>

                        </div>

                        <div class="mt-2 h-2 rounded-full bg-slate-200">

                            <div
                                class="h-2 rounded-full bg-indigo-600"
                                style="width:{{ min($category->products_count*10,100) }}%">

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            {{-- Low Stock --}}
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="font-bold mb-5">

                    Low Stock Alert

                </h2>

                @forelse($lowStockProducts as $item)

                    <div class="border-b pb-3 mb-3">

                        <p class="font-semibold">

                            {{ $item->name }}

                        </p>

                        <p class="text-red-500 text-sm">

                            Remaining {{ $item->stock }} units

                        </p>

                    </div>

                @empty

                    <p class="text-green-600">

                        🎉 All inventory is healthy.

                    </p>

                @endforelse

            </div>

        </div>

    </div>

</div>

@endsection