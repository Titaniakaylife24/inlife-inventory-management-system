<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - InLife IMS</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white">

@include('components.landing.navbar')

<x-page-bg class="pt-36 pb-24">

    <div class="max-w-7xl mx-auto px-6">

        {{-- HERO --}}
        <div class="text-center">

            <div class="inline-flex px-4 py-2 rounded-full bg-pink-100 text-pink-600 font-semibold text-sm mb-6">
                🏢 About InLife
            </div>

            <h1 class="text-5xl font-black">
                Empowering Smarter Asset Management
            </h1>

            <p class="mt-4 text-slate-500 max-w-3xl mx-auto">
                InLife Inventory Management System was built to help
                organizations manage assets efficiently, securely,
                and transparently through a modern digital platform.
            </p>

        </div>

        {{-- STORY --}}
        <div class="grid lg:grid-cols-2 gap-12 items-center mt-20">

            <div class="card-inlife p-10">
                <h2 class="text-3xl font-bold mb-6">
                    Our Story
                </h2>

                <p class="text-slate-500 leading-8">
                    Many companies still manage inventory manually using spreadsheets
                    or paper-based processes. This often leads to asset loss,
                    inefficient stock monitoring, and poor reporting.
                </p>

                <p class="text-slate-500 leading-8 mt-5">
                    InLife IMS was created to solve these problems by providing
                    centralized asset tracking, role-based management,
                    and real-time analytics.
                </p>
            </div>

            <div class="card-inlife p-10">
                <img src="{{ asset('images/logo_inlife.png') }}"
                     class="w-56 mx-auto">
            </div>

        </div>

        {{-- VISION MISSION --}}
        <div class="grid md:grid-cols-2 gap-8 mt-20">

            <div class="card-inlife p-8">
                <div class="text-5xl">🎯</div>

                <h3 class="text-2xl font-bold mt-4">
                    Vision
                </h3>

                <p class="mt-4 text-slate-500 leading-8">
                    To become a reliable digital solution for modern
                    inventory and asset management.
                </p>
            </div>

            <div class="card-inlife p-8">
                <div class="text-5xl">🚀</div>

                <h3 class="text-2xl font-bold mt-4">
                    Mission
                </h3>

                <p class="mt-4 text-slate-500 leading-8">
                    Simplify asset management, improve operational efficiency,
                    and provide transparent reporting.
                </p>
            </div>

        </div>

        {{-- CORE VALUES --}}
        <div class="mt-20">

            <h2 class="text-3xl font-bold text-center">
                Our Core Values
            </h2>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                @foreach([
                    ['🔒','Security'],
                    ['⚡','Efficiency'],
                    ['📊','Transparency'],
                    ['💡','Innovation']
                ] as [$icon,$value])

                <div class="card-inlife p-6 text-center">
                    <div class="text-5xl">{{ $icon }}</div>

                    <h3 class="font-bold text-xl mt-4">
                        {{ $value }}
                    </h3>
                </div>

                @endforeach

            </div>

        </div>
</x-page-bg>

@include('components.dashboard.footer')

</body>
</html>