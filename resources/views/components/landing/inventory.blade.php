<section id="inventory" class="py-24 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">
            <h2 class="text-5xl font-black">
                Inventory Overview
            </h2>

            <p class="text-slate-500 mt-4 max-w-2xl mx-auto">
                Monitor all company assets with real-time tracking,
                borrowing status, and stock analytics.
            </p>
        </div>

        {{-- Summary --}}
        <div class="grid md:grid-cols-4 gap-6 mt-14">

            <div class="card-inlife text-center">
                <h3 class="text-4xl font-bold text-pink-500">128</h3>
                <p>Total Assets</p>
            </div>

            <div class="card-inlife text-center">
                <h3 class="text-4xl font-bold text-green-500">89</h3>
                <p>Available</p>
            </div>

            <div class="card-inlife text-center">
                <h3 class="text-4xl font-bold text-yellow-500">31</h3>
                <p>Borrowed</p>
            </div>

            <div class="card-inlife text-center">
                <h3 class="text-4xl font-bold text-red-500">8</h3>
                <p>Maintenance</p>
            </div>

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

</section>