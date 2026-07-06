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

    <div class="card-inlife text-center">
        <h2 class="text-4xl font-black text-pink-500">
            {{ $totalAssets }}
        </h2>
        <p>Total Assets</p>
    </div>

    <div class="card-inlife text-center">
        <h2 class="text-4xl font-black text-green-500">
            {{ $available }}
        </h2>
        <p>Available</p>
    </div>

    <div class="card-inlife text-center">
        <h2 class="text-4xl font-black text-yellow-500">
            {{ $borrowed }}
        </h2>
        <p>Borrowed</p>
    </div>

    <div class="card-inlife text-center">
        <h2 class="text-4xl font-black text-red-500">
            {{ $maintenance }}
        </h2>
        <p>Maintenance</p>
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
            class="h-40 rounded-2xl bg-gradient-to-r from-pink-200 to-purple-200 flex items-center justify-center mb-4">

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

        <span class="text-green-500 font-semibold">

            Available

        </span>

    @elseif($product->status=='Borrowed')

        <span class="text-yellow-500 font-semibold">

            Borrowed

        </span>

    @else

        <span class="text-red-500 font-semibold">

            Maintenance

        </span>

    @endif

</div>

@endforeach

</div>

<div class="mt-10">

    {{ $products->links() }}

</div>

    </div>

</x-page-bg>