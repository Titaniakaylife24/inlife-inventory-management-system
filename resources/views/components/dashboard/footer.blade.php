<footer class="bg-slate-950 text-white pt-16 pb-8">

    <div class="max-w-7xl mx-auto px-8">

        {{-- Top CTA --}}
        <div
            class="bg-gradient-to-r from-pink-500 to-purple-600 rounded-3xl p-8 mb-14 flex flex-col lg:flex-row items-center justify-between gap-6">

            <div>
                <h2 class="text-3xl font-bold">
                    Start Managing Assets Smarter
                </h2>

                <p class="text-pink-100 mt-2">
                    Simplify inventory tracking, borrowing, and reporting with InLife IMS.
                </p>
            </div>

            <a href="{{ route('register') }}"
               class="bg-white text-pink-600 px-6 py-3 rounded-2xl font-semibold hover:scale-105 transition">
                Get Started
            </a>

        </div>

        {{-- Main Footer --}}
        <div class="grid lg:grid-cols-4 gap-10">

            {{-- Brand --}}
            <div>

                <img src="{{ asset('images/logo_inlife.png') }}"
                     class="w-20 mb-4">

                <h2 class="font-bold text-2xl">
                    InLife IMS
                </h2>

                <p class="mt-4 text-slate-400 leading-relaxed">
                    A modern inventory management system designed to streamline asset tracking,
                    borrowing, and reporting in one integrated platform.
                </p>

            </div>

            {{-- Navigation --}}
            <div>

                <h3 class="font-bold text-lg mb-4">
                    Navigation
                </h3>

                <ul class="space-y-3 text-slate-400">

                    <li><a href="{{ route('home') }}" class="hover:text-pink-400">Home</a></li>
                    <li><a href="{{ route('inventory') }}" class="hover:text-pink-400">Inventory</a></li>
                    <li><a href="{{ route('roles') }}" class="hover:text-pink-400">Roles</a></li>
                    <li><a href="{{ route('reports') }}" class="hover:text-pink-400">Reports</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-pink-400">About Us</a></li>

                </ul>

            </div>

            {{-- Features --}}
            <div>

                <h3 class="font-bold text-lg mb-4">
                    Core Features
                </h3>

                <ul class="space-y-3 text-slate-400">

                    <li>Asset Tracking</li>
                    <li>Borrowing System</li>
                    <li>Stock Monitoring</li>
                    <li>Role Access Control</li>
                    <li>Analytics Reports</li>

                </ul>

            </div>

            {{-- Technologies --}}
            <div>

                <h3 class="font-bold text-lg mb-4">
                    Technology Stack
                </h3>

                <ul class="space-y-3 text-slate-400">

                    <li>Laravel 12</li>
                    <li>Tailwind CSS</li>
                    <li>MySQL</li>
                    <li>Vite</li>
                    <li>Chart.js</li>

                </ul>

            </div>

        </div>

        {{-- Bottom --}}
        <div
            class="border-t border-slate-800 mt-14 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-slate-500">

            <p>
                © {{ date('Y') }} InLife Inventory Management System.
            </p>

            <p>
                Built for smarter asset management.
            </p>

        </div>

    </div>

</footer>