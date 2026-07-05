@extends('layouts.dashboard')

@section('title','Borrow Requests')

@section('content')

<div class="space-y-8">

<div>

<h1 class="text-3xl font-black text-slate-800">
Borrow Requests
</h1>

<p class="text-slate-500 mt-2">
Monitor all borrowing requests submitted by employees.
</p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

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
'title'=>'Returned',
'value'=>$returned,
'icon'=>'🔄',
'color'=>'from-blue-500 to-cyan-500'
])

</div>

<div class="bg-white rounded-3xl shadow p-6">

<form method="GET">

<div class="grid lg:grid-cols-4 gap-4">

<input
type="text"
name="search"
value="{{ request('search') }}"
placeholder="Search borrower or asset..."
class="rounded-xl border-slate-300">

<select
name="status"
class="rounded-xl border-slate-300">

<option value="">All Status</option>

<option value="Pending"
@selected(request('status')=='Pending')>

Pending

</option>

<option value="Approved"
@selected(request('status')=='Approved')>

Approved

</option>

<option value="Returned"
@selected(request('status')=='Returned')>

Returned

</option>

</select>

<button
class="rounded-xl bg-fuchsia-600 text-white font-semibold">

Search

</button>

<a
href="{{ route('borrow-request.index') }}"
class="rounded-xl bg-slate-200 flex items-center justify-center">

Reset

</a>

</div>

</form>

</div>

<div class="bg-white rounded-3xl shadow overflow-hidden">

<div class="overflow-x-auto">

<table class="min-w-full">

<thead class="bg-slate-100">

<tr>

<th class="px-6 py-4">Code</th>

<th class="px-6 py-4">Borrower</th>

<th class="px-6 py-4">Asset</th>

<th class="px-6 py-4">Qty</th>

<th class="px-6 py-4">Borrow Date</th>

<th class="px-6 py-4">Status</th>

<th class="px-6 py-4 text-center">Action</th>

</tr>

</thead>

<tbody>

@forelse($borrowings as $borrow)

<tr class="border-t hover:bg-slate-50">

<td class="px-6 py-4">

{{ $borrow->borrow_code }}

</td>

<td class="px-6 py-4">

{{ $borrow->borrower_name }}

</td>

<td class="px-6 py-4">

{{ $borrow->product->name }}

</td>

<td class="px-6 py-4">

{{ $borrow->quantity }}

</td>

<td class="px-6 py-4">

{{ \Carbon\Carbon::parse($borrow->borrow_date)->format('d M Y') }}

</td>

<td class="px-6 py-4">

@if($borrow->status=="Pending")

<span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">

Pending

</span>

@elseif($borrow->status=="Approved")

<span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">

Approved

</span>

@else

<span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-sm">

Returned

</span>

@endif

</td>

<td class="px-6 py-4 text-center">

<button
disabled
class="px-4 py-2 rounded-lg bg-slate-200 text-slate-500 cursor-not-allowed">

Waiting Admin

</button>

</td>

</tr>

@empty

<tr>

<td colspan="7"
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