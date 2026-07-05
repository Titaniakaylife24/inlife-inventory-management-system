@extends('layouts.dashboard')

@section('title','Staff Dashboard')

@section('content')

<div class="space-y-8">

@include('components.dashboard.welcome-card')

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

@include('components.dashboard.stat-card',[
'title'=>'Total Assets',
'value'=>$totalAssets,
'icon'=>'📦',
'color'=>'from-fuchsia-500 to-pink-600',
'link'=>route('dashboard.inventory.index')
])

@include('components.dashboard.stat-card',[
'title'=>'Available',
'value'=>$availableAssets,
'icon'=>'✅',
'color'=>'from-green-500 to-emerald-600',
'link'=>route('dashboard.inventory.index')
])

@include('components.dashboard.stat-card',[
'title'=>'Low Stock',
'value'=>$lowStock,
'icon'=>'⚠️',
'color'=>'from-orange-500 to-red-500',
'link'=>route('stock.index')
])

@include('components.dashboard.stat-card',[
'title'=>'Maintenance',
'value'=>$maintenanceAssets,
'icon'=>'🛠️',
'color'=>'from-violet-500 to-indigo-600',
'link'=>route('dashboard.inventory.index')
])

</div>

@include('components.dashboard.quick-action-staff')

<div class="grid xl:grid-cols-3 gap-6">

<div class="xl:col-span-2 bg-white rounded-3xl shadow p-6">

<h2 class="text-xl font-bold mb-5">

Recently Added Assets

</h2>

<table class="w-full">

<thead>

<tr class="border-b text-slate-500">

<th class="pb-3 text-left">

Code

</th>

<th>

Asset

</th>

<th>

Category

</th>

<th>

Stock

</th>

<th>

Status

</th>

</tr>

</thead>

<tbody class="divide-y">

@foreach($recentProducts as $item)

<tr>

<td class="py-4">

{{ $item->code }}

</td>

<td>

{{ $item->name }}

</td>

<td>

{{ $item->category->name }}

</td>

<td>

{{ $item->stock }}

</td>

<td>

@if($item->status=='Available')

<span class="text-green-600 font-semibold">

Available

</span>

@elseif($item->status=='Borrowed')

<span class="text-amber-600 font-semibold">

Borrowed

</span>

@else

<span class="text-red-600 font-semibold">

Maintenance

</span>

@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

<div class="space-y-6">

<div class="bg-white rounded-3xl shadow p-6">

    <h2 class="font-bold mb-5">

        Inventory Alerts

    </h2>

    @forelse($lowStockProducts as $item)

        <div class="mb-4 border-b pb-3">

            <p class="font-semibold">

                {{ $item->name }}

            </p>

            <p class="text-red-500 text-sm">

                Remaining {{ $item->stock }} units

            </p>

        </div>

    @empty

        <p class="text-green-600">

            🎉 No low stock items.

        </p>

    @endforelse

</div>

<div class="bg-white rounded-3xl shadow p-6">

<h2 class="font-bold mb-5">

Latest Borrow Requests

</h2>

@foreach($borrowRequests as $borrow)

<div class="mb-4 border-b pb-3">

<p class="font-semibold">

{{ $borrow->borrower_name }}

</p>

<p class="text-sm text-slate-500">

{{ $borrow->borrow_code }}

</p>

<span class="text-xs">

{{ $borrow->status }}

</span>

</div>

@endforeach

</div>

</div>

</div>

</div>

@endsection