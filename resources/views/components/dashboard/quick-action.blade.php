<div>

    <h2 class="text-2xl font-bold text-slate-800 mb-5">

        Quick Actions

    </h2>

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Borrow --}}
        <a href="{{ route('borrow.index') }}"
        class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-2xl hover:-translate-y-2 transition">

            <div
            class="w-16 h-16 rounded-2xl
            bg-gradient-to-r from-pink-500 to-purple-600
            flex items-center justify-center
            text-white text-3xl">

                📦

            </div>

            <h3 class="font-bold text-lg mt-5">

                Borrow Asset

            </h3>

            <p class="text-slate-500 mt-2">

                Request company assets.

            </p>

            <div class="mt-6 text-fuchsia-600 font-semibold">

                Open →

            </div>

        </a>


        {{-- Return --}}
        <a href="{{ route('return.index') }}"
        class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-2xl hover:-translate-y-2 transition">

            <div
            class="w-16 h-16 rounded-2xl
            bg-gradient-to-r from-emerald-500 to-green-600
            flex items-center justify-center
            text-white text-3xl">

                🔄

            </div>

            <h3 class="font-bold text-lg mt-5">

                Return Asset

            </h3>

            <p class="text-slate-500 mt-2">

                Return borrowed assets.

            </p>

            <div class="mt-6 text-green-600 font-semibold">

                Open →

            </div>

        </a>


        {{-- Inventory --}}
        <a href="{{ route('dashboard.inventory.index') }}"
        class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-2xl hover:-translate-y-2 transition">

            <div
            class="w-16 h-16 rounded-2xl
            bg-gradient-to-r from-blue-500 to-cyan-500
            flex items-center justify-center
            text-white text-3xl">

                🖥️

            </div>

            <h3 class="font-bold text-lg mt-5">

                Inventory

            </h3>

            <p class="text-slate-500 mt-2">

                Browse all company assets.

            </p>

            <div class="mt-6 text-blue-600 font-semibold">

                Open →

            </div>

        </a>


        {{-- My Borrowings --}}
        <a href="{{ route('myborrow.index') }}"
        class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-2xl hover:-translate-y-2 transition">

            <div
            class="w-16 h-16 rounded-2xl
            bg-gradient-to-r from-orange-500 to-amber-500
            flex items-center justify-center
            text-white text-3xl">

                📋

            </div>

            <h3 class="font-bold text-lg mt-5">

                My Borrowings

            </h3>

            <p class="text-slate-500 mt-2">

                View your borrowing history.

            </p>

            <div class="mt-6 text-orange-600 font-semibold">

                Open →

            </div>

        </a>

    </div>

</div>