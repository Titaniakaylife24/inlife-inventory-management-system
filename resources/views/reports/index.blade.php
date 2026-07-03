<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - InLife IMS</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white">

    @include('components.landing.navbar')

    <x-page-bg>

        <div class="max-w-7xl mx-auto px-6">

            {{-- HERO --}}
            <div class="text-center">

                <div class="inline-flex px-4 py-2 rounded-full bg-emerald-100 text-emerald-600 font-semibold text-sm mb-6">
                    📊 Analytics & Reports
                </div>

                <h1 class="text-5xl font-black">
                    Inventory Performance Reports
                </h1>

                <p class="mt-4 text-slate-500 max-w-3xl mx-auto">
                    Gain insights into asset utilization, stock movement,
                    borrowing trends, and operational efficiency.
                </p>

            </div>

            {{-- SUMMARY CARDS --}}
            <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mt-16">

                @foreach([
                    ['92%', 'Asset Utilization'],
                    ['34', 'Monthly Borrowings'],
                    ['8', 'Maintenance Cases'],
                    ['12%', 'Growth Rate']
                ] as [$number, $label])

                    <div class="card-inlife text-center p-8">

                        <h2 class="text-4xl font-black text-emerald-500">
                            {{ $number }}
                        </h2>

                        <p class="mt-3 text-slate-500">
                            {{ $label }}
                        </p>

                    </div>

                @endforeach

            </div>

            {{-- CHART --}}
            <div class="card-inlife mt-16 p-8">

                <h2 class="text-2xl font-bold mb-8">
                    Monthly Borrowing Trend
                </h2>

                <div class="space-y-6">

                    @foreach([
                        ['January', 45],
                        ['February', 68],
                        ['March', 80],
                        ['April', 57],
                        ['May', 76]
                    ] as [$month, $value])

                        <div>

                            <div class="flex justify-between mb-2">
                                <span>{{ $month }}</span>
                                <span>{{ $value }}</span>
                            </div>

                            <div class="w-full h-4 bg-slate-200 rounded-full overflow-hidden">
                                <div
                                    class="h-full rounded-full bg-gradient-to-r from-pink-500 to-purple-600"
                                    style="width: {{ $value }}%">
                                </div>
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- REPORT TYPES --}}
            <div class="mt-20">

                <h2 class="text-3xl font-bold text-center">
                    Available Report Types
                </h2>

                <p class="text-center text-slate-500 mt-3">
                    Generate reports based on business needs.
                </p>

                <div class="grid md:grid-cols-3 gap-6 mt-12">

                    @foreach([
                        ['📦', 'Asset Report', 'Detailed inventory list and stock status'],
                        ['📈', 'Usage Report', 'Borrowing frequency and utilization metrics'],
                        ['🧾', 'Audit Report', 'System logs and asset transaction history']
                    ] as [$icon, $title, $desc])

                        <div class="card-inlife p-8 text-center">

                            <div class="text-5xl">
                                {{ $icon }}
                            </div>

                            <h3 class="font-bold text-xl mt-4">
                                {{ $title }}
                            </h3>

                            <p class="mt-3 text-slate-500">
                                {{ $desc }}
                            </p>

                        </div>

                    @endforeach

                </div>

            </div>

            {{-- EXPORT BUTTON --}}
            <div class="text-center mt-20">

                <button
                    class="px-8 py-4 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 text-white font-semibold shadow-lg hover:scale-105 transition">
                    Export Report
                </button>

            </div>

        </div>

</x-page-bg>

    @include('components.cta')
    @include('components.dashboard.footer')

</body>
</html>