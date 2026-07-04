<x-page-bg class="pt-36 pb-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">
            <h1 class="text-5xl font-black">
                Smart Inventory Management
            </h1>

            <p class="mt-4 text-slate-500 max-w-3xl mx-auto">
                Track every company asset, monitor stock availability,
                and manage borrowing activities in real time.
            </p>
        </div>

        {{-- Summary Cards --}}
        <div class="grid md:grid-cols-4 gap-6 mt-14">

            @foreach([
                ['128', 'Total Assets'],
                ['89', 'Available'],
                ['31', 'Borrowed'],
                ['8', 'Maintenance']
            ] as [$number, $label])

                <div class="card-inlife text-center">
                    <h2 class="text-4xl font-black text-pink-500">
                        {{ $number }}
                    </h2>
                    <p class="mt-2 text-slate-500">{{ $label }}</p>
                </div>

            @endforeach

        </div>

        {{-- Asset Cards --}}
        <div class="grid md:grid-cols-4 gap-6 mt-14">

            @foreach([
                ['Dell Laptop', 'Available'],
                ['Epson Printer', 'Borrowed'],
                ['Sony Projector', 'Maintenance'],
                ['Office Chair', 'Available']
            ] as [$name, $status])

                <div class="card-inlife">
                    <div class="h-40 rounded-2xl bg-gradient-to-r from-pink-200 to-purple-200 mb-4"></div>

                    <h3 class="font-semibold text-lg">
                        {{ $name }}
                    </h3>

                    <span class="text-sm text-pink-500">
                        {{ $status }}
                    </span>
                </div>

            @endforeach

        </div>

    </div>

</x-page-bg>