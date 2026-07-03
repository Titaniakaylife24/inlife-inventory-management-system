<header class="bg-white dark:bg-slate-900 border-b border-gray-200 dark:border-slate-700">

    <div class="px-8 h-20 flex justify-between items-center">

        <div>

            <h2 class="text-2xl font-bold">

                @yield('title')

            </h2>

            <p class="text-sm text-gray-500">

                Welcome back,
                {{ Auth::user()->name }}

            </p>

        </div>

        <div class="flex items-center gap-4">

            <button
                class="w-10 h-10 rounded-full bg-pink-100 flex items-center justify-center">

                🔔

            </button>

            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=ec4899&color=fff"
                class="w-11 h-11 rounded-full">

        </div>

    </div>

</header>