<div>

    <h2 class="text-2xl font-bold text-slate-800 mb-5">
        Quick Actions
    </h2>

    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- Add Inventory --}}
        <a href="{{ route('dashboard.inventory.create') }}"
           class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl">
                ➕
            </div>

            <h3 class="font-bold text-lg mt-5">
                Add Inventory
            </h3>

            <p class="text-slate-500 mt-2">
                Add new assets into the inventory system.
            </p>

        </a>

        {{-- Inventory --}}
        <a href="{{ route('dashboard.inventory.index') }}"
           class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-xl hover:-translate-y-2 transition">

            <div class="text-5xl">
                📦
            </div>

            <h3 class="font-bold text-lg mt-5">
                Inventory
            </h3>

            <p class="text-slate-500 mt-2">
                 View and update company inventory data.
            </p>

        </a>

        {{-- Stock Monitoring --}}
<a href="{{ route('stock.index') }}"
   class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-xl hover:-translate-y-2 transition">

    <div class="text-5xl">
        📊
    </div>

    <h3 class="font-bold text-lg mt-5">
        Stock Monitoring
    </h3>

    <p class="text-slate-500 mt-2">
        Monitor stock levels and identify assets that need attention.
    </p>

</a>

        {{-- Borrow Requests --}}
<a href="{{ route('borrow-request.index') }}"
   class="group bg-white rounded-3xl p-6 shadow-md hover:shadow-xl hover:-translate-y-2 transition">

    <div class="text-5xl">
        📋
    </div>

    <h3 class="font-bold text-lg mt-5">
        Borrow Requests
    </h3>

    <p class="text-slate-500 mt-2">
        Review and manage employee borrowing requests.
    </p>

</a>

    </div>

</div>