<aside class="w-72 min-h-screen bg-white dark:bg-slate-900 border-r border-gray-200 dark:border-slate-700 flex flex-col">

    {{-- Logo --}}
    <div class="px-6 py-6 border-b border-gray-200 dark:border-slate-700">

        <div class="flex items-center gap-3">

            <img src="{{ asset('images/logo_inlife.png') }}"
                 class="w-12 h-12 object-contain">

            <div>
                <h1 class="font-bold text-lg text-pink-600">
                    InLife IMS
                </h1>

                <p class="text-xs text-gray-500">
                    Inventory Management
                </p>
            </div>

        </div>

    </div>

    {{-- User --}}
    <div class="px-6 py-5 border-b border-gray-200 dark:border-slate-700">

        <p class="text-sm text-gray-500">
            Logged in as
        </p>

        <h3 class="font-semibold mt-1">
            {{ Auth::user()->name }}
        </h3>

        <span
            class="inline-block mt-3 px-3 py-1 rounded-full bg-pink-100 text-pink-600 text-xs font-semibold">

            {{ Auth::user()->role->name }}

        </span>

    </div>

    {{-- Menu --}}
    <nav class="flex-1 px-4 py-6">

        <p class="text-xs uppercase text-gray-400 mb-3">
            Main Menu
        </p>

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-pink-100 dark:hover:bg-slate-800 transition">

            <x-heroicon-o-home class="w-5 h-5"/>

            Dashboard

        </a>

    </nav>

    {{-- Footer --}}
    <div class="p-4 border-t border-gray-200 dark:border-slate-700">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white transition">

                <x-heroicon-o-arrow-right-on-rectangle class="w-5 h-5"/>

                Logout

            </button>

        </form>

    </div>

</aside>