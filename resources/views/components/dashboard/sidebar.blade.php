@php
    $role = Auth::user()->role->name;
@endphp

<aside
class="relative
h-screen
bg-slate-900
text-white
shadow-2xl
transition-all
duration-300
overflow-hidden
flex-shrink-0"
:class="openSidebar ? 'w-72' : 'w-0'">

    <div class="h-24 flex items-center px-7 border-b border-slate-700">

        <img
            src="{{ asset('images/logo_inlife.png') }}"
            class="w-12">

        <div class="ml-4">

            <h1 class="font-bold text-3xl">

                InLife IMS

            </h1>

            <p class="text-slate-400">

                Inventory Management

            </p>

        </div>

    </div>

    <div class="p-7 border-b border-slate-700">

        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-full
                bg-gradient-to-r
                from-pink-500
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

<nav class="p-5 space-y-2">

    {{-- Dashboard --}}
    <a href="{{ route('dashboard.employee') }}"
       class="sidebar-link {{
            request()->routeIs('dashboard')
            || request()->routeIs('dashboard.employee')
            ? 'active' : ''
       }}">
        <i class="fa-solid fa-house"></i>
        <span>Dashboard</span>
    </a>

    {{-- Inventory --}}
    <a href="{{ route('dashboard.inventory.index') }}"
       class="sidebar-link {{
            request()->routeIs('dashboard.inventory.*')
            ? 'active' : ''
       }}">
        <i class="fa-solid fa-boxes-stacked"></i>
        <span>Inventory</span>
    </a>

    {{-- Borrow --}}
    <a href="{{ route('borrow.index') }}"
   class="sidebar-link {{ request()->routeIs('borrow.*') ? 'active' : '' }}">
        <i class="fa-solid fa-hand-holding"></i>
        <span>Borrow Asset</span>
    </a>

    {{-- Return --}}
    <a href="{{ route('return.index') }}"
class="sidebar-link {{ request()->routeIs('return.*') ? 'active' : '' }}">
        <i class="fa-solid fa-right-left"></i>
        <span>Return Asset</span>
    </a>

    {{-- My Borrowings --}}
    <a href="{{ route('myborrow.index') }}"
class="sidebar-link {{ request()->routeIs('myborrow.*') ? 'active' : '' }}">
        <i class="fa-solid fa-clipboard-list"></i>
        <span>My Borrowings</span>
    </a>

    {{-- Profile --}}
    <a href="{{ route('profile.edit') }}"
class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
        <i class="fa-solid fa-user"></i>
        <span>Profile</span>
    </a>

</nav>

    <div class="absolute bottom-5 left-5 right-5">

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