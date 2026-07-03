<nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg z-50 border-b border-slate-200">

    <div class="max-w-7xl mx-auto px-8 py-4 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <img src="{{ asset('images/logo_inlife.png') }}"
                 class="w-16 h-16 object-contain">

            <div>
                <h1 class="text-2xl font-bold text-pink-600">
                    InLife
                </h1>

                <p class="text-sm text-slate-500">
                    Inventory Management
                </p>
            </div>

        </div>

        <div class="hidden md:flex items-center gap-8">

            <a href="{{ route('home') }}"
               class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                Home
            </a>

            <a href="{{ route('inventory') }}"
               class="nav-link {{ request()->routeIs('inventory') ? 'active' : '' }}">
                Inventory
            </a>

            <a href="{{ route('roles') }}"
               class="nav-link {{ request()->routeIs('roles') ? 'active' : '' }}">
                Roles
            </a>

            <a href="{{ route('reports') }}"
               class="nav-link {{ request()->routeIs('reports') ? 'active' : '' }}">
                Reports
            </a>

            <a href="{{ route('about') }}"
               class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                About Us
            </a>

        </div>

        <div class="flex items-center gap-4">

            <a href="{{ route('login') }}"
               class="font-semibold text-slate-700 hover:text-pink-500 transition">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="btn-primary">
                Register
            </a>

        </div>

    </div>

</nav>