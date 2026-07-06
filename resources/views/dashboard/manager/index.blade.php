@extends('layouts.dashboard')

@section('title','Manager Dashboard')

@section('content')

<div class="space-y-8">

<div>

<h1 class="text-3xl font-black text-slate-800">

Manager Dashboard

</h1>

<p class="text-slate-500 mt-2">

Monitor company assets, borrowing activities, and inventory performance.

</p>

</div>

<div
class="rounded-3xl
bg-gradient-to-r
from-indigo-600
to-purple-700
p-8
text-white">

<h2 class="text-3xl font-black">

Welcome Back,

{{ Auth::user()->name }}

</h2>

<p class="mt-3 opacity-90">

Here is today's inventory performance summary.

</p>

</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

@include('components.dashboard.stat-card',[
'title'=>'Total Assets',
'value'=>$totalAssets,
'icon'=>'📦',
'color'=>'from-indigo-500 to-purple-600'
])

@include('components.dashboard.stat-card',[
'title'=>'Available',
'value'=>$availableAssets,
'icon'=>'✅',
'color'=>'from-green-500 to-emerald-600'
])

@include('components.dashboard.stat-card',[
'title'=>'Borrowed',
'value'=>$borrowedAssets,
'icon'=>'📋',
'color'=>'from-orange-500 to-red-500'
])

@include('components.dashboard.stat-card',[
'title'=>'Low Stock',
'value'=>$lowStock,
'icon'=>'⚠',
'color'=>'from-red-500 to-pink-600'
])

</div>

