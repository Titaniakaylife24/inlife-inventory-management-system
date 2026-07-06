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
        <h3 class="text-4xl font-bold text-pink-500">
            {{ $totalAssets }}
        </h3>
        <p>Total Assets</p>
    </div>

    <div class="card-inlife text-center">
        <h3 class="text-4xl font-bold text-green-500">
            {{ $available }}
        </h3>
        <p>Available</p>
    </div>

    <div class="card-inlife text-center">
        <h3 class="text-4xl font-bold text-yellow-500">
            {{ $borrowed }}
        </h3>
        <p>Borrowed</p>
    </div>

    <div class="card-inlife text-center">
        <h3 class="text-4xl font-bold text-red-500">
            {{ $maintenance }}
        </h3>
        <p>Maintenance</p>
    </div>

</div>

<div class="flex justify-between items-center mt-14 mb-6">

    <div>

        <h2 class="text-2xl font-bold">

            Company Assets

        </h2>

        <p class="text-slate-500">

            Showing {{ $products->count() }} of {{ $totalAssets }} assets

        </p>

    </div>

</div>

        {{-- Asset Cards --}}
        <div class="grid md:grid-cols-4 gap-6 mt-14">

            @foreach($products as $product)

<div class="card-inlife">

    @if($product->image)

        <img
            src="{{ asset('storage/'.$product->image) }}"
            class="w-full h-40 object-cover rounded-2xl mb-4">

    @else

        <div
            class="h-40 rounded-2xl bg-gradient-to-r from-pink-200 to-purple-200 mb-4 flex items-center justify-center">

            <i class="fa-solid fa-box text-5xl text-white"></i>

        </div>

    @endif

    <h3 class="font-semibold text-lg">

        {{ $product->name }}

    </h3>

    <p class="text-slate-500 text-sm">

        {{ $product->category->name }}

    </p>

    @if($product->status=='Available')

        <span class="text-green-500 text-sm font-semibold">

            Available

        </span>

    @elseif($product->status=='Borrowed')

        <span class="text-yellow-500 text-sm font-semibold">

            Borrowed

        </span>

    @else

        <span class="text-red-500 text-sm font-semibold">

            Maintenance

        </span>

    @endif

</div>

@endforeach

<div class="mt-10">

    {{ $products->links() }}

</div>



        </div>

    </div>

</section>