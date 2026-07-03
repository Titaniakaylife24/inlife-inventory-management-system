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

            <div>

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

                <div class="mt-10 grid grid-cols-2 gap-5">

                    <div class="flex items-center gap-3">

                        ✅

                        <span>Asset Tracking</span>

                    </div>

                    <div class="flex items-center gap-3">

                        ✅

                        <span>Borrowing System</span>

                    </div>

                    <div class="flex items-center gap-3">

                        ✅

                        <span>Live Dashboard</span>

                    </div>

                    <div class="flex items-center gap-3">

                        ✅

                        <span>Role Management</span>

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

                        <div
                            class="mt-8 h-40 rounded-2xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center">

                            📈 Inventory Analytics

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>