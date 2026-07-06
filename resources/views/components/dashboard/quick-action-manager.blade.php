<div class="grid md:grid-cols-4 gap-5">

    <a href="{{ route('manager.inventory.index') }}"
       class="rounded-2xl bg-white shadow p-6 hover:shadow-lg transition">

        <div class="text-4xl mb-3">📦</div>

        <h3 class="font-bold">

            Inventory

        </h3>

        <p class="text-slate-500 text-sm">

            View inventory assets.

        </p>

    </a>

    <a href="{{ route('manager.borrow-request.index') }}"
       class="rounded-2xl bg-white shadow p-6 hover:shadow-lg transition">

        <div class="text-4xl mb-3">📋</div>

        <h3 class="font-bold">

            Borrow Requests

        </h3>

        <p class="text-slate-500 text-sm">

            Monitor borrow requests.

        </p>

    </a>

    <a href="{{ route('manager.stock.index') }}"
       class="rounded-2xl bg-white shadow p-6 hover:shadow-lg transition">

        <div class="text-4xl mb-3">📊</div>

        <h3 class="font-bold">

            Stock Monitoring

        </h3>

        <p class="text-slate-500 text-sm">

            Check inventory stock.

        </p>

    </a>

    <a href="{{ route('manager.report.index') }}"
       class="rounded-2xl bg-white shadow p-6 hover:shadow-lg transition">

        <div class="text-4xl mb-3">📑</div>

        <h3 class="font-bold">

            Reports

        </h3>

        <p class="text-slate-500 text-sm">

            View analytical reports.

        </p>

    </a>

</div>