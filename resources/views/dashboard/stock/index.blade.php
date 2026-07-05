@extends('layouts.dashboard')

@section('title','Stock Monitoring')

@section('content')

<div class="space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-black text-slate-800">
            Stock Monitoring
        </h1>

        <p class="text-slate-500 mt-2">
            Monitor inventory stock levels and identify items that need attention.
        </p>
    </div>

    {{-- Statistic Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        @include('components.dashboard.stat-card',[
'title'=>'Total Assets',
'value'=>$totalAssets,
'icon'=>'📦',
'color'=>'from-fuchsia-500 to-pink-600',
'url'=>route('stock.index')
])

        @include('components.dashboard.stat-card',[
'title'=>'Healthy',
'value'=>$healthyStock,
'icon'=>'✅',
'color'=>'from-green-500 to-emerald-600',
'url'=>route('stock.index',[
'status'=>'healthy'
])
])

        @include('components.dashboard.stat-card',[
'title'=>'Low Stock',
'value'=>$lowStock,
'icon'=>'⚠️',
'color'=>'from-orange-500 to-red-500',
'url'=>route('stock.index',[
'status'=>'low'
])
])

        @include('components.dashboard.stat-card',[
'title'=>'Out of Stock',
'value'=>$emptyStock,
'icon'=>'❌',
'color'=>'from-red-500 to-rose-600',
'url'=>route('stock.index',[
'status'=>'empty'
])
])

    </div>

    {{-- Alert --}}
    @if($lowStock > 0)

    <div class="rounded-2xl border border-red-200 bg-red-50 p-5">

        <h3 class="font-bold text-red-600">
            ⚠ Inventory Alert
        </h3>

        <p class="mt-2 text-red-500">
            There are {{ $lowStock }} assets whose stock is below the minimum limit.
        </p>

    </div>

    @endif

    {{-- Filter --}}
    <div class="bg-white rounded-3xl shadow p-6">

        <form method="GET">

            <div class="grid lg:grid-cols-4 gap-4">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search asset..."
                    class="rounded-xl border-slate-300">

                <select
                    name="category"
                    class="rounded-xl border-slate-300">

                    <option value="">All Category</option>

                    @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(request('category')==$category->id)>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                <select
                    name="status"
                    class="rounded-xl border-slate-300">

                    <option value="">All Status</option>
                    <option value="normal" @selected(request('status')=='normal')>Healthy</option>
                    <option value="low" @selected(request('status')=='low')>Low Stock</option>
                    <option value="empty" @selected(request('status')=='empty')>Out of Stock</option>

                </select>

                <div class="flex gap-3">

    <button
        type="submit"
        class="flex-1 rounded-xl bg-fuchsia-600 text-white font-semibold hover:bg-fuchsia-700">

        Search

    </button>

    <a
        href="{{ route('stock.index') }}"
        class="px-6 flex items-center justify-center rounded-xl bg-slate-200 text-slate-700 font-semibold hover:bg-slate-300">

        Reset

    </a>

</div>

            </div>

        </form>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

<tr class="text-left">

    <th class="px-6 py-4">Code</th>
    <th class="px-6 py-4">Asset</th>
    <th class="px-6 py-4">Category</th>
    <th class="px-6 py-4">Current Stock</th>
    <th class="px-6 py-4">Minimum</th>
    <th class="px-6 py-4">Status</th>

    @if(auth()->user()->role->name == 'Admin')
        <th class="px-6 py-4 text-center">
            Action
        </th>
    @endif

</tr>

</thead>

                <tbody>

                @forelse($products as $product)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4 font-semibold">
                            {{ $product->code }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->name }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $product->category->name }}
                        </td>

                        <td class="px-6 py-4">

                            <div class="font-bold">
                                {{ $product->stock }}
                            </div>

                            <div class="w-32 h-2 rounded-full bg-slate-200 mt-2">

                                <div
                                    class="h-2 rounded-full bg-fuchsia-600"
                                    style="width: {{ min(($product->stock / max($product->minimum_stock * 2,1))*100,100) }}%">

                                </div>

                            </div>

                        </td>

                        <td class="px-6 py-4">
                            {{ $product->minimum_stock }}
                        </td>

                        <td class="px-6 py-4">

                            @if($product->stock == 0)

                                <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-sm">
                                    Out of Stock
                                </span>

                            @elseif($product->stock <= $product->minimum_stock)

                                <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                    Low Stock
                                </span>

                            @else

                                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                    Healthy
                                </span>

                            @endif

                        </td>

                        @if(auth()->user()->role->name == 'Admin')

<td class="px-6 py-4">

    <div class="flex justify-center">

        <a
            href="{{ route('dashboard.inventory.edit', $product) }}"
            class="w-10 h-10 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-200">

            <i class="fa-solid fa-pen"></i>

        </a>

    </div>

</td>

@endif

                    </tr>

                @empty

                    <tr>

                        <td colspan="{{ auth()->user()->role->name == 'Admin' ? 7 : 6 }}"
    class="py-10 text-center text-slate-500">

                            No inventory found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="p-5 border-t">

            {{ $products->links() }}

        </div>

    </div>

</div>

@endsection