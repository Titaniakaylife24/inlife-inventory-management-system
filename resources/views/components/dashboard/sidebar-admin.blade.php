@php
    $role = Auth::user()->role->name;
@endphp

<aside
class="flex flex-col
h-screen
bg-slate-900
text-white
shadow-xl
transition-all
duration-300
flex-shrink-0"
:class="openSidebar ? 'w-64' : 'w-0'">

    {{-- Logo --}}
    <div class="h-24 flex items-center px-7 border-b border-slate-700">

        <img
            src="{{ asset('images/logo_inlife.png') }}"
            class="w-12">

        <div class="ml-4">

            <h1 class="font-bold text-3xl">
                InLife IMS
            </h1>

            <p class="text-slate-400">
                Admin Panel
            </p>

        </div>

    </div>

    {{-- User --}}
    <div class="p-7 border-b border-slate-700">

        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-full
                bg-gradient-to-r
                from-fuchsia-500
                to-purple-600
                flex items-center justify-center
                font-bold text-2xl">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

            <div>

                <h2 class="font-semibold">

                    {{ Auth::user()->name }}

                </h2>

                <p class="text-slate-400">

                    {{ $role }}

                </p>

            </div>

        </div>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 overflow-y-auto px-5 py-5 space-y-2">

        {{-- Dashboard --}}
        <a href="{{ route('dashboard.admin') }}"
        class="sidebar-link {{ request()->routeIs('dashboard.admin') ? 'active' : '' }}">

            <i class="fa-solid fa-chart-line"></i>

            <span>Dashboard</span>

        </a>

        {{-- Inventory --}}
        <a href="{{ route('dashboard.inventory.index') }}"
        class="sidebar-link {{ request()->routeIs('dashboard.inventory.*') ? 'active' : '' }}">

            <i class="fa-solid fa-boxes-stacked"></i>

            <span>Inventory</span>

        </a>

        {{-- Categories --}}
        <a href="{{ route('category.index') }}"
        class="sidebar-link {{ request()->routeIs('category.*') ? 'active' : '' }}">

            <i class="fa-solid fa-layer-group"></i>

            <span>Categories</span>

        </a>

        {{-- Locations --}}
<a href="{{ route('location.index') }}"
class="sidebar-link {{ request()->routeIs('location.*') ? 'active' : '' }}">

    <i class="fa-solid fa-location-dot"></i>

    <span>Locations</span>

</a>

        {{-- Users --}}
        <a href="{{ route('users.index') }}"
        class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">

            <i class="fa-solid fa-users"></i>

            <span>Users</span>

        </a>

        {{-- Borrow Requests --}}
        <a href="{{ route('borrow-request.index') }}"
        class="sidebar-link {{ request()->routeIs('borrow-request.*') ? 'active' : '' }}">

            <i class="fa-solid fa-file-signature"></i>

            <span>Borrow Requests</span>

        </a>

        {{-- Stock Monitoring --}}
        <a href="{{ route('stock.index') }}"
        class="sidebar-link {{ request()->routeIs('stock.*') ? 'active' : '' }}">

            <i class="fa-solid fa-chart-column"></i>

            <span>Stock Monitoring</span>

        </a>

        {{-- Reports --}}
        <a href="{{ route('report.index') }}"
        class="sidebar-link {{ request()->routeIs('report.*') ? 'active' : '' }}">

            <i class="fa-solid fa-file-lines"></i>

            <span>Reports</span>

        </a>

        {{-- Profile --}}
        <a href="{{ route('profile.edit') }}"
        class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">

            <i class="fa-solid fa-user"></i>

            <span>Profile</span>

        </a>

    </nav>

    {{-- Logout --}}
    <div class="p-5 border-t border-slate-700">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                onclick="return confirm('Are you sure you want to logout?')"
                class="w-full
                rounded-xl
                bg-gradient-to-r
                from-fuchsia-600
                to-purple-600
                hover:opacity-90
                transition
                py-3
                font-semibold">

                Logout

            </button>

        </form>

    </div>

</aside>