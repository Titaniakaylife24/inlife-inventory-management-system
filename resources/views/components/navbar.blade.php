<header
    class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-xl border-b border-slate-200/70 dark:border-slate-700">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">

                <img
                    src="{{ asset('images/logo_inlife.png') }}"
                    alt="InLife Logo"
                    class="w-11 h-11 object-contain">

                <div>

                    <h1 class="font-bold text-lg text-pink-600">
                        InLife
                    </h1>

                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Inventory Management
                    </p>

                </div>

            </a>

            <!-- Desktop Menu -->

            <nav class="hidden lg:flex items-center gap-10">

                <a href="#home"
                    class="font-medium hover:text-pink-500 transition">
                    Home
                </a>

                <a href="#features"
                    class="font-medium hover:text-pink-500 transition">
                    Features
                </a>

                <a href="#statistics"
                    class="font-medium hover:text-pink-500 transition">
                    Statistics
                </a>

                <a href="#workflow"
                    class="font-medium hover:text-pink-500 transition">
                    Workflow
                </a>

                <a href="#contact"
                    class="font-medium hover:text-pink-500 transition">
                    Contact
                </a>

            </nav>

            <!-- Right Menu -->

            <div class="hidden lg:flex items-center gap-4">

                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-slate-700 dark:text-white hover:text-pink-500">

                    Login

                </a>

                <a
                    href="{{ route('register') }}"
                    class="px-6 py-2 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow-lg hover:scale-105 duration-300">

                    Register

                </a>

            </div>

            <!-- Mobile Button -->

            <button
                class="lg:hidden">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-7 h-7"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>

        </div>

    </div>

</header>