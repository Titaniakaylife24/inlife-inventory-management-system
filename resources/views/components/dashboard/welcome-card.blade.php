@php
    $role = Auth::user()->role->name;
@endphp

<div
class="relative
overflow-hidden
rounded-3xl
bg-gradient-to-r
from-fuchsia-600
via-purple-600
to-indigo-700
text-white
p-8
shadow-xl">

    {{-- Background --}}
    <div class="absolute -top-20 -left-20 w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-80 h-80 bg-pink-400/10 rounded-full blur-3xl"></div>

    <div class="absolute top-12 right-32 w-3 h-3 bg-white/60 rounded-full"></div>

    <div class="absolute top-24 right-52 w-2 h-2 bg-white/40 rounded-full"></div>

    <div class="absolute bottom-16 left-1/2 w-4 h-4 bg-white/20 rounded-full"></div>

    <div class="relative grid lg:grid-cols-2 items-center gap-8">

        {{-- Left --}}
        <div>

            <p class="text-pink-100 text-lg font-medium">
                👋 Welcome Back
            </p>

            <h1 class="text-4xl font-black mt-2">
                {{ Auth::user()->name }}
            </h1>

            <p class="mt-5 text-pink-100 leading-8 max-w-xl">

@if($role == 'Employee')

    Browse available assets and submit borrowing requests easily through the system.

@elseif($role == 'Staff')

    Monitor inventory stock levels and review borrowing requests submitted by employees.

@elseif($role == 'Admin')

    Manage inventory data, users, categories, locations, and ensure all operational activities run smoothly.

@elseif($role == 'Manager')

    Monitor inventory performance and review reports to support strategic decisions.

@endif

</p>

            {{-- Action Button --}}
            <div class="mt-8 flex gap-4">

    {{-- Employee --}}
    @if($role == 'Employee')

        <a
            href="{{ route('borrow.index') }}"
            class="px-6 py-3 rounded-xl bg-white text-fuchsia-700 font-semibold shadow-lg hover:scale-105 transition">

            Borrow Asset →

        </a>

        <a
            href="{{ route('dashboard.inventory.index') }}"
            class="px-6 py-3 rounded-xl border border-white/30 bg-white/10">

            View Inventory

        </a>

    {{-- Staff --}}
    @elseif($role == 'Staff')

        <a
            href="{{ route('stock.index') }}"
            class="px-6 py-3 rounded-xl bg-white text-fuchsia-700 font-semibold">

            Stock Monitoring →

        </a>

        <a
            href="{{ route('borrow-request.index') }}"
            class="px-6 py-3 rounded-xl border border-white/30 bg-white/10">

            Borrow Requests

        </a>

    {{-- Admin --}}
    @elseif($role == 'Admin')

        <a
            href="{{ route('dashboard.inventory.index') }}"
            class="px-6 py-3 rounded-xl bg-white text-fuchsia-700 font-semibold">

            Manage Inventory →

        </a>

        <a
            href="{{ route('report.index') }}"
            class="px-6 py-3 rounded-xl border border-white/30 bg-white/10">

            Reports

        </a>

    {{-- Manager --}}
@elseif($role == 'Manager')

    <a
        href="{{ route('manager.report.index') }}"
        class="px-6 py-3 rounded-xl bg-white text-fuchsia-700 font-semibold shadow-lg hover:scale-105 transition">

        Reports →

    </a>

    <a
        href="{{ route('manager.stock.index') }}"
        class="px-6 py-3 rounded-xl border border-white/30 bg-white/10 hover:bg-white/20 transition">

        Stock Monitoring

    </a>

@endif

</div>

        </div>

        {{-- Right --}}
        <div class="hidden lg:flex justify-center items-center relative">

            <div class="absolute w-72 h-72 bg-white/10 rounded-full blur-3xl"></div>

            <div class="absolute w-56 h-56 border border-white/20 rounded-full"></div>

            <img
                src="{{ asset('images/maskot_login.gif') }}"
                class="relative w-80 floating drop-shadow-2xl">

        </div>

    </div>

</div>

<style>

@keyframes floating{

    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-12px);
    }

}

.floating{

    animation:floating 3s ease-in-out infinite;

}

</style>