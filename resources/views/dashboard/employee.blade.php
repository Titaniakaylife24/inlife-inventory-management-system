@extends('layouts.dashboard')

@section('title','Employee Dashboard')

@section('content')

<div class="space-y-8">

    {{-- Welcome --}}
    @include('components.dashboard.welcome-card')

    {{-- Statistics --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        @include('components.dashboard.stat-card',[
            'title'=>'Borrowed Assets',
            'value'=>$borrowed,
            'icon'=>'📦',
            'color'=>'from-pink-500 to-fuchsia-600',
            'link'=>route('myborrow.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Returned',
            'value'=>$returned,
            'icon'=>'✅',
            'color'=>'from-green-500 to-emerald-600',
            'link'=>route('myborrow.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Pending Approval',
            'value'=>$pending,
            'icon'=>'⏳',
            'color'=>'from-amber-400 to-orange-500',
            'link'=>route('myborrow.index')
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Available Assets',
            'value'=>$available,
            'icon'=>'🏢',
            'color'=>'from-violet-500 to-indigo-600',
            'link'=>route('dashboard.inventory.index')
        ])

    </div>


    {{-- Quick Actions --}}
    @include('components.dashboard.quick-action')


    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        {{-- Recent Borrowings --}}
        <div class="xl:col-span-2 bg-white rounded-3xl shadow p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-xl font-bold text-slate-800">

                    Recent Borrowings

                </h2>

                <a
                    href="{{ route('myborrow.index') }}"
                    class="text-fuchsia-600 font-semibold hover:underline">

                    View All

                </a>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>

                        <tr class="border-b text-slate-500">

                            <th class="text-left pb-3">Asset</th>

                            <th class="text-left pb-3">Borrow Date</th>

                            <th class="text-left pb-3">Return Date</th>

                            <th class="text-left pb-3">Status</th>

                        </tr>

                    </thead>

                    <tbody class="divide-y">

                        @forelse($recentBorrowings as $borrow)

                        <tr>

                            <td class="py-4 font-medium">

                                {{ $borrow->product->name }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}

                            </td>

                            <td>

                                {{ \Carbon\Carbon::parse($borrow->expected_return_date)->format('d M Y') }}

                            </td>

                            <td>

                                @if($borrow->status=="Pending")

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

                                        Pending

                                    </span>

                                @elseif($borrow->status=="Approved")

                                    <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

                                        Approved

                                    </span>

                                @elseif($borrow->status=="Returned")

                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

                                        Returned

                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">

                                        Rejected

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="py-8 text-center text-slate-400">

                                You haven't borrowed any assets yet.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Side Card --}}
        <div class="space-y-6">

            {{-- Upcoming Return --}}
            <div class="bg-white rounded-3xl shadow p-6">

                <h2 class="font-bold text-slate-800 mb-4">

                    Upcoming Return

                </h2>

                @if($upcomingReturn)

                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="font-bold text-lg">

                            {{ $upcomingReturn->product->name }}

                        </p>

                        <p class="text-sm text-slate-500 mt-2">

                            Return Before

                        </p>

                        <p class="font-semibold mt-1">

                            {{ \Carbon\Carbon::parse($upcomingReturn->expected_return_date)->format('d M Y') }}

                        </p>

                        <span class="inline-block mt-4 px-3 py-1 rounded-full bg-red-100 text-red-600 text-sm">

                            {{ now()->diffInDays($upcomingReturn->expected_return_date,false) }}

                            days remaining

                        </span>

                    </div>

                @else

                    <div class="bg-slate-50 rounded-2xl p-5 text-center text-slate-500">

                        No active borrowings.

                    </div>

                @endif

            </div>


            {{-- New Assets --}}
            <div class="bg-white rounded-3xl shadow p-6">

                <div class="flex justify-between items-center mb-5">

                    <h2 class="font-bold text-slate-800">

                        New Assets

                    </h2>

                    <a
                        href="{{ route('dashboard.inventory.index') }}"
                        class="text-fuchsia-600 text-sm font-semibold">

                        View

                    </a>

                </div>

                <div class="space-y-4">

                    @foreach($latestAssets as $asset)

                        <div class="flex justify-between items-center border-b pb-3">

                            <div>

                                <p class="font-semibold">

                                    {{ $asset->name }}

                                </p>

                                <p class="text-sm text-slate-500">

                                    {{ $asset->brand }}

                                </p>

                            </div>

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs">

                                Available

                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>

@endsection