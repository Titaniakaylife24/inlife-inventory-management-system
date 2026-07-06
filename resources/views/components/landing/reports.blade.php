<section
class="relative overflow-hidden pt-36 pb-24
bg-gradient-to-br
from-pink-50
via-white
to-purple-100">

    {{-- Background Blur --}}
    <div class="absolute top-0 left-0 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Hero --}}
        <div class="text-center">

            <span
                class="inline-flex items-center px-5 py-2 rounded-full
                bg-pink-100 text-pink-600 font-semibold">

                📊 Real-Time Analytics

            </span>

            <h1 class="mt-6 text-5xl lg:text-6xl font-black">

                Smart Reports

            </h1>

            <p class="mt-6 text-lg text-slate-600 max-w-3xl mx-auto leading-8">

                Generate accurate inventory insights directly from the database.
                Track borrowing trends, asset availability, and operational performance
                in real time.

            </p>

        </div>

        {{-- Summary --}}
        <div class="grid md:grid-cols-4 gap-6 mt-16">

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-pink-500">

                    {{ $totalBorrowings }}

                </h2>

                <p class="mt-3 text-slate-500">

                    Total Borrowings

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-green-500">

                    {{ $approved }}

                </h2>

                <p class="mt-3 text-slate-500">

                    Approved

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-yellow-500">

                    {{ $pending }}

                </h2>

                <p class="mt-3 text-slate-500">

                    Pending

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-blue-500">

                    {{ $returned }}

                </h2>

                <p class="mt-3 text-slate-500">

                    Returned

                </p>

            </div>

        </div>

        {{-- Analytics --}}
        <div class="grid lg:grid-cols-3 gap-8 mt-16">

            <div
                class="rounded-3xl p-8 bg-gradient-to-r from-pink-500 to-fuchsia-600 text-white shadow-xl">

                <h3 class="text-2xl font-bold">

                    Total Assets

                </h3>

                <h2 class="text-6xl font-black mt-6">

                    {{ $totalAssets }}

                </h2>

                <p class="mt-4 text-pink-100">

                    Registered company assets

                </p>

            </div>

            <div
                class="rounded-3xl p-8 bg-gradient-to-r from-yellow-400 to-orange-500 text-white shadow-xl">

                <h3 class="text-2xl font-bold">

                    Borrowed Assets

                </h3>

                <h2 class="text-6xl font-black mt-6">

                    {{ $borrowed }}

                </h2>

                <p class="mt-4 text-yellow-100">

                    Currently borrowed

                </p>

            </div>

            <div
                class="rounded-3xl p-8 bg-gradient-to-r from-red-500 to-rose-600 text-white shadow-xl">

                <h3 class="text-2xl font-bold">

                    Maintenance

                </h3>

                <h2 class="text-6xl font-black mt-6">

                    {{ $maintenance }}

                </h2>

                <p class="mt-4 text-red-100">

                    Assets under maintenance

                </p>

            </div>

        </div>

        {{-- Insight --}}
        <div class="mt-20">

            <h2 class="text-4xl font-black text-center">

                Why Real-Time Reports?

            </h2>

            <p class="text-center text-slate-500 mt-4 max-w-3xl mx-auto">

                Managers and administrators can instantly monitor inventory,
                identify borrowing activity, and make informed decisions based
                on up-to-date information.

            </p>

            <div class="grid md:grid-cols-3 gap-8 mt-10">

                <div class="card-inlife">

                    <div class="text-5xl">

                        📈

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Live Statistics

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Data is updated automatically from the inventory database.

                    </p>

                </div>

                <div class="card-inlife">

                    <div class="text-5xl">

                        📦

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Asset Monitoring

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Monitor stock levels and borrowing activity in one place.

                    </p>

                </div>

                <div class="card-inlife">

                    <div class="text-5xl">

                        ⚡

                    </div>

                    <h3 class="font-bold text-xl mt-5">

                        Better Decisions

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Accurate reports help improve operational efficiency.

                    </p>

                </div>

            </div>

        </div>

    </div>

</section>