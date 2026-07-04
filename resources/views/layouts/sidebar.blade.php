<aside
    class="w-72 bg-slate-950 text-white flex flex-col shadow-2xl">

    {{-- ================= LOGO ================= --}}
    <div class="px-8 py-7 border-b border-slate-800">

        <div class="flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-2xl
                bg-gradient-to-br
                from-pink-500
                to-violet-600
                flex items-center justify-center
                shadow-lg">

                <img
                    src="{{ asset('images/logo_inlife.png') }}"
                    class="w-9">

            </div>

            <div>

                <h2 class="font-black text-xl">
                    InLife IMS
                </h2>

                <p class="text-xs text-slate-400">
                    Inventory Management
                </p>

            </div>

        </div>

    </div>

    {{-- ================= MENU ================= --}}
    <div class="flex-1 px-5 py-8">

        <p
            class="uppercase text-xs
            tracking-widest
            text-slate-500
            mb-4">

            MAIN MENU

        </p>

        <nav class="space-y-2">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                bg-gradient-to-r
                from-pink-500
                to-violet-600
                font-semibold
                shadow-lg">

                🏠

                Dashboard

            </a>

            <a href="#"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                hover:bg-slate-800
                transition">

                📦

                Inventory

            </a>

            <a href="#"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                hover:bg-slate-800
                transition">

                📋

                Borrowings

            </a>

            <a href="#"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                hover:bg-slate-800
                transition">

                📊

                Reports

            </a>

            <a href="#"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                hover:bg-slate-800
                transition">

                👥

                Users

            </a>

            <a href="#"
                class="flex items-center gap-3
                px-4 py-3 rounded-2xl
                hover:bg-slate-800
                transition">

                🔐

                Roles

            </a>

        </nav>

    </div>

    {{-- ================= USER ================= --}}
    <div
        class="border-t border-slate-800
        p-5">

        <div
            class="bg-slate-900 rounded-2xl
            p-4">

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12
                    rounded-full
                    bg-gradient-to-r
                    from-pink-500
                    to-violet-600
                    flex items-center justify-center
                    font-bold">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

                <div>

                    <h3 class="font-semibold">

                        {{ Auth::user()->name }}

                    </h3>

                    <p class="text-sm text-slate-400">

                        {{ Auth::user()->role->name }}

                    </p>

                </div>

            </div>

            <form
                method="POST"
                action="{{ route('logout') }}"
                class="mt-4">

                @csrf

                <button
                    class="w-full
                    rounded-xl
                    py-2.5
                    bg-gradient-to-r
                    from-pink-500
                    to-violet-600
                    font-semibold
                    hover:opacity-90
                    transition">

                    🚪 Logout

                </button>

            </form>

        </div>

    </div>

</aside>