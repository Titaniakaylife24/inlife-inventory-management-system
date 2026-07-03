<section id="home"
    class="relative overflow-hidden pt-36 pb-24 bg-gradient-to-br from-pink-50 via-white to-purple-100 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950">

    <!-- Background Blur -->
    <div
        class="absolute top-0 left-0 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl">
    </div>

    <div
        class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl">
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->
<div class="relative">

                <span
                    class="inline-flex items-center px-4 py-2 rounded-full bg-pink-100 text-pink-600 font-semibold text-sm">

                    🚀 Smart Inventory Solution

                </span>

                <h1
                    class="mt-6 text-5xl lg:text-6xl font-black leading-tight">

                    Manage Office Assets

                    <span
                        class="bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">

                        Smarter

                    </span>

                </h1>

                <p
                    class="mt-8 text-lg text-slate-600 dark:text-slate-300 leading-8">

                    InLife Inventory Management System membantu perusahaan
                    mengelola inventaris, peminjaman aset, monitoring stok,
                    hingga pelaporan secara efisien dalam satu platform modern.

                </p>

                <!-- Features -->

                <div class="flex flex-wrap gap-4 mt-8">

    <div class="card-inlife">
        <p class="text-sm text-slate-500">Total Assets</p>
        <h3 class="font-bold text-2xl">128+</h3>
    </div>

    <div class="card-inlife">
        <p class="text-sm text-slate-500">Borrowed</p>
        <h3 class="font-bold text-2xl">34</h3>
    </div>

    <div class="card-inlife">
        <p class="text-sm text-slate-500">Low Stock</p>
        <h3 class="font-bold text-2xl">8</h3>
    </div>

</div>
                <!-- Button -->

                <div class="mt-10 flex gap-4 flex-wrap">

                    <a href="{{ route('register') }}"
                        class="px-8 py-4 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold shadow-xl hover:scale-105 transition">

                        Get Started

                    </a>

                    <a href="{{ route('login') }}"
                        class="px-8 py-4 rounded-xl border border-pink-500 text-pink-600 hover:bg-pink-500 hover:text-white transition">

                        Login

                    </a>

                </div>

                <div class="mt-10 flex items-center gap-4 flex-wrap">

    <div class="flex -space-x-3">
        <img src="https://i.pravatar.cc/50?img=1"
             class="w-10 h-10 rounded-full border-2 border-white">

        <img src="https://i.pravatar.cc/50?img=2"
             class="w-10 h-10 rounded-full border-2 border-white">

        <img src="https://i.pravatar.cc/50?img=3"
             class="w-10 h-10 rounded-full border-2 border-white">
    </div>

    <div>
        <p class="font-semibold text-sm">
            Trusted by 50+ Teams
        </p>

        <p class="text-xs text-slate-500">
            HR, IT, Finance, Operations
        </p>
    </div>

</div>

<div class="mt-20">

    <h2 class="text-4xl font-black text-center">
        Why Choose InLife IMS?
    </h2>

    <p class="text-center text-slate-500 mt-4 max-w-2xl mx-auto">
        Built for modern companies to track assets, control access, and
        generate reports in real time.
    </p>

    <div class="grid md:grid-cols-3 gap-8 mt-6">

        <div class="p-6 rounded-3xl bg-white/60 backdrop-blur-md shadow-lg border border-white/40">
            <div class="text-4xl">⚡</div>
            <h3 class="font-bold text-xl mt-4">Fast Tracking</h3>
            <p class="mt-3 text-slate-500">
                Asset movement tracked instantly.
            </p>
        </div>

        <div class="p-8 rounded-3xl bg-white/60 backdrop-blur-md shadow-lg border border-white/40">
            <div class="text-4xl">🔒</div>
            <h3 class="font-bold text-xl mt-4">Secure Access</h3>
            <p class="mt-3 text-slate-500">
                Role-based permissions.
            </p>
        </div>

        <div class="p-8 rounded-3xl bg-white/60 backdrop-blur-md shadow-lg border border-white/40">
            <div class="text-4xl">📊</div>
            <h3 class="font-bold text-xl mt-4">Smart Reports</h3>
            <p class="mt-3 text-slate-500">
                Real-time analytics dashboard.
            </p>
        </div>

    </div>

</div>
            </div>


            <!-- RIGHT -->

            <div class="relative">

                <div
                    class="rounded-3xl bg-white dark:bg-slate-900 shadow-2xl border border-slate-200 dark:border-slate-700 overflow-hidden">

                    <!-- Header -->

                    <div
                        class="flex items-center gap-2 px-6 py-4 border-b">

                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>

                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>

                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>

                    </div>

                    <!-- Dashboard Preview -->

                    <div class="p-8">

                        <div
                            class="flex justify-between items-center mb-8">

                            <div>

                                <h2 class="font-bold text-xl">

                                    Dashboard

                                </h2>

                                <p class="text-slate-500 text-sm">

                                    Inventory Overview

                                </p>

                            </div>

                            <img
                                src="{{ asset('images/logo_inlife.png') }}"
                                class="w-14">

                        </div>

                        <!-- Cards -->

                        <div class="grid grid-cols-2 gap-5">

                            <div
                                class="rounded-2xl bg-pink-500 text-white p-5">

                                <p>Total Assets</p>

                                <h2
                                    class="text-4xl font-bold mt-2">

                                    128

                                </h2>

                            </div>

                            <div
                                class="rounded-2xl bg-purple-500 text-white p-5">

                                <p>Borrowed</p>

                                <h2
                                    class="text-4xl font-bold mt-2">

                                    16

                                </h2>

                            </div>

                            <div
                                class="rounded-2xl bg-sky-500 text-white p-5">

                                <p>Categories</p>

                                <h2
                                    class="text-4xl font-bold mt-2">

                                    12

                                </h2>

                            </div>

                            <div
                                class="rounded-2xl bg-emerald-500 text-white p-5">

                                <p>Locations</p>

                                <h2
                                    class="text-4xl font-bold mt-2">

                                    8

                                </h2>

                            </div>

                        </div>

                        <!-- Fake Chart -->

                        <div class="card-inlife w-full mt-6">

    <h3 class="font-bold text-lg mb-6">
        Live Inventory Overview
    </h3>

    <div class="space-y-4">

        <div class="flex justify-between">
            <span>Dell Laptop</span>
            <span class="text-green-500 font-medium">Available</span>
        </div>

        <div class="flex justify-between">
            <span>Epson Printer</span>
            <span class="text-yellow-500 font-medium">Borrowed</span>
        </div>

        <div class="flex justify-between">
            <span>Projector Sony</span>
            <span class="text-red-500 font-medium">Maintenance</span>
        </div>

    </div>

    <div class="mt-8 rounded-2xl overflow-hidden">
        <img src="{{ asset('images/inventory-preview.jpg.jpg') }}"
             class="w-full object-cover">
    </div>

</div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>