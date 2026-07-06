<section
class="relative overflow-hidden pt-36 pb-24
bg-gradient-to-br
from-pink-50
via-white
to-purple-100">

    {{-- Background --}}
    <div class="absolute top-0 left-0 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-6">

        {{-- Hero --}}
        <div class="text-center">

            <span
                class="inline-flex items-center px-5 py-2 rounded-full
                bg-pink-100 text-pink-600 font-semibold">

                💡 About InLife IMS

            </span>

            <h1 class="mt-6 text-5xl lg:text-6xl font-black">

                Smarter Inventory,
                <span class="bg-gradient-to-r from-pink-500 to-purple-600 bg-clip-text text-transparent">
                    Better Business
                </span>

            </h1>

            <p class="mt-8 text-lg text-slate-600 max-w-3xl mx-auto leading-8">

                InLife Inventory Management System is designed to help organizations
                manage company assets efficiently. From inventory tracking,
                borrowing management, stock monitoring, to reporting,
                everything is integrated into one modern platform.

            </p>

        </div>

        {{-- Vision & Mission --}}
        <div class="grid lg:grid-cols-2 gap-10 mt-20">

            <div class="card-inlife">

                <div class="text-5xl">

                    🌍

                </div>

                <h2 class="text-3xl font-black mt-6">

                    Our Vision

                </h2>

                <p class="mt-5 text-slate-600 leading-8">

                    To become a trusted digital inventory management solution
                    that empowers companies to improve operational efficiency,
                    transparency, and smarter decision-making.

                </p>

            </div>

            <div class="card-inlife">

                <div class="text-5xl">

                    🚀

                </div>

                <h2 class="text-3xl font-black mt-6">

                    Our Mission

                </h2>

                <ul class="mt-5 space-y-4 text-slate-600">

                    <li>✔ Simplify inventory management.</li>

                    <li>✔ Monitor assets in real time.</li>

                    <li>✔ Improve borrowing efficiency.</li>

                    <li>✔ Provide accurate reporting.</li>

                </ul>

            </div>

        </div>

        {{-- Core Values --}}
        <div class="mt-24">

            <h2 class="text-4xl font-black text-center">

                Our Core Values

            </h2>

            <p class="text-center text-slate-500 mt-4 max-w-2xl mx-auto">

                Everything we build is based on efficiency, transparency,
                security, and innovation.

            </p>

            <div class="grid md:grid-cols-4 gap-8 mt-12">

                <div class="card-inlife text-center">

                    <div class="text-5xl">⚡</div>

                    <h3 class="font-bold text-xl mt-5">

                        Efficiency

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Simplify workflows and reduce manual processes.

                    </p>

                </div>

                <div class="card-inlife text-center">

                    <div class="text-5xl">🔍</div>

                    <h3 class="font-bold text-xl mt-5">

                        Transparency

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Real-time monitoring of every asset.

                    </p>

                </div>

                <div class="card-inlife text-center">

                    <div class="text-5xl">🛡</div>

                    <h3 class="font-bold text-xl mt-5">

                        Reliability

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Secure, structured, and reliable data management.

                    </p>

                </div>

                <div class="card-inlife text-center">

                    <div class="text-5xl">💡</div>

                    <h3 class="font-bold text-xl mt-5">

                        Innovation

                    </h3>

                    <p class="mt-3 text-slate-500">

                        Continuously improving with modern technology.

                    </p>

                </div>

            </div>

        </div>

        {{-- Company Highlights --}}
        <div class="grid md:grid-cols-4 gap-8 mt-24">

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-pink-500">

                    24/7

                </h2>

                <p class="mt-3 text-slate-500">

                    System Availability

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-purple-500">

                    100%

                </h2>

                <p class="mt-3 text-slate-500">

                    Digital Workflow

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-green-500">

                    Real-Time

                </h2>

                <p class="mt-3 text-slate-500">

                    Inventory Monitoring

                </p>

            </div>

            <div class="card-inlife text-center">

                <h2 class="text-5xl font-black text-orange-500">

                    Secure

                </h2>

                <p class="mt-3 text-slate-500">

                    Role-Based Access

                </p>

            </div>

        </div>

        {{-- CTA --}}
        <div
            class="mt-24 rounded-3xl
            bg-gradient-to-r
            from-pink-500
            via-fuchsia-600
            to-purple-600
            p-12 text-center text-white shadow-2xl">

            <h2 class="text-4xl font-black">

                Ready to Transform Your Inventory Management?

            </h2>

            <p class="mt-5 text-pink-100 max-w-3xl mx-auto leading-8">

                Experience a smarter way to manage assets, monitor inventory,
                and generate reports with InLife Inventory Management System.

            </p>

            <div class="mt-10 flex justify-center gap-5 flex-wrap">

                <a href="{{ route('register') }}"
                    class="px-8 py-4 rounded-xl bg-white text-pink-600 font-bold hover:scale-105 transition">

                    Get Started

                </a>

                <a href="{{ route('login') }}"
                    class="px-8 py-4 rounded-xl border border-white text-white hover:bg-white hover:text-pink-600 transition">

                    Login

                </a>

            </div>

        </div>

    </div>

</section>