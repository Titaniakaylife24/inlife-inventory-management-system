@extends('layouts.dashboard')

@section('title','Borrow Requests')

@section('content')

@if(session('success'))
<div class="mb-6 rounded-xl bg-green-100 border border-green-200 p-4 text-green-700">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 rounded-xl bg-red-100 border border-red-200 p-4 text-red-700">
    {{ session('error') }}
</div>
@endif

<div class="space-y-8">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-black text-slate-800">
            Borrow Requests
        </h1>

        <p class="text-slate-500 mt-2">
            Monitor and manage employee borrowing requests.
        </p>

    </div>

    {{-- Statistic --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6">

        @include('components.dashboard.stat-card',[
            'title'=>'Total Requests',
            'value'=>$totalRequest,
            'icon'=>'📄',
            'color'=>'from-fuchsia-500 to-pink-600'
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Pending',
            'value'=>$pending,
            'icon'=>'🟡',
            'color'=>'from-yellow-400 to-amber-500'
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Approved',
            'value'=>$approved,
            'icon'=>'✅',
            'color'=>'from-green-500 to-emerald-600'
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Rejected',
            'value'=>$rejected,
            'icon'=>'❌',
            'color'=>'from-red-500 to-rose-600'
        ])

        @include('components.dashboard.stat-card',[
            'title'=>'Returned',
            'value'=>$returned,
            'icon'=>'🔄',
            'color'=>'from-blue-500 to-cyan-500'
        ])

    </div>

    {{-- Search --}}
    <div class="bg-white rounded-3xl shadow p-6">

        <form method="GET">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

        {{-- Search --}}
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search borrower, code or asset..."
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        {{-- Status --}}
        <select
            name="status"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            <option value="">All Status</option>

            <option value="Pending"
                @selected(request('status')=='Pending')>
                Pending
            </option>

            <option value="Approved"
                @selected(request('status')=='Approved')>
                Approved
            </option>

            <option value="Rejected"
                @selected(request('status')=='Rejected')>
                Rejected
            </option>

            <option value="Returned"
                @selected(request('status')=='Returned')>
                Returned
            </option>

        </select>

        {{-- Search Button --}}
        <button
            type="submit"
            class="w-full rounded-xl bg-gradient-to-r
                   from-fuchsia-600 to-purple-600
                   text-white font-semibold
                   hover:opacity-90 transition">

            Search

        </button>

        {{-- Reset Button --}}
        <a href="{{ route('borrow-request.index') }}"
           class="w-full rounded-xl bg-slate-200
                  hover:bg-slate-300
                  transition
                  flex items-center justify-center
                  font-semibold text-slate-700">

            Reset

        </a>

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

                    <th class="px-6 py-4">Borrower</th>

                    <th class="px-6 py-4">Asset</th>

                    <th class="px-6 py-4 text-center">Qty</th>

                    <th class="px-6 py-4">Borrow Date</th>

                    <th class="px-6 py-4">Status</th>

                    <th class="px-6 py-4 text-center">Action</th>

                </tr>

                </thead>

                <tbody>

                @forelse($borrowings as $borrow)

                <tr class="border-t hover:bg-slate-50">

                    <td class="px-6 py-4 font-semibold">

                        {{ $borrow->borrow_code }}

                    </td>

                    <td class="px-6 py-4">

                        <div class="font-semibold">

                            {{ $borrow->borrower_name }}

                        </div>

                        <div class="text-sm text-slate-500">

                            {{ $borrow->user->email }}

                        </div>

                    </td>

                    <td class="px-6 py-4">

                        {{ $borrow->product->name }}

                    </td>

                    <td class="px-6 py-4 text-center font-bold">

                        {{ $borrow->quantity }}

                    </td>

                    <td class="px-6 py-4">

                        {{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}

                    </td>

                    {{-- Status --}}
                    <td class="px-6 py-4">

                        @switch($borrow->status)

                            @case('Pending')
                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                Pending
                            </span>
                            @break

                            @case('Approved')
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Approved
                            </span>
                            @break

                            @case('Rejected')
                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Rejected
                            </span>
                            @break

                            @case('Returned')
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">
                                Returned
                            </span>
                            @break

                        @endswitch

                    </td>

                    {{-- Action --}}
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            {{-- Detail --}}
                            <a
                                href="{{ route('borrow-request.show',$borrow) }}"
                                class="w-10 h-10 rounded-lg bg-sky-100 text-sky-600 flex items-center justify-center hover:bg-sky-200">

                                <i class="fa-solid fa-eye"></i>

                            </a>

                            {{-- ADMIN --}}
                            @if(auth()->user()->role->name=='Admin')

                                @if($borrow->status=='Pending')

                                {{-- Approve --}}
                                <form
                                    method="POST"
                                    action="{{ route('borrow-request.approve',$borrow) }}">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        onclick="return confirm('Approve this request?')"
                                        class="w-10 h-10 rounded-lg bg-green-100 text-green-700 hover:bg-green-200">

                                        <i class="fa-solid fa-check"></i>

                                    </button>

                                </form>

                                {{-- Reject --}}
                                <form
                                    method="POST"
                                    action="{{ route('borrow-request.reject',$borrow) }}">

                                    @csrf
                                    @method('PATCH')

                                    <button
                                        onclick="return confirm('Reject this request?')"
                                        class="w-10 h-10 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">

                                        <i class="fa-solid fa-xmark"></i>

                                    </button>

                                </form>

                                @endif

                            @endif

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td
                        colspan="7"
                        class="py-10 text-center text-slate-500">

                        No borrow requests found.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="p-5 border-t">

            {{ $borrowings->links() }}

        </div>

    </div>

</div>

@endsection