@php
    $role = auth()->user()->role->name;
@endphp

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Asset Code --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Asset Code
        </label>

        <input
    type="text"
    name="code"
    value="{{ old('code', $product->code ?? '') }}"
    @if($role=='Staff' && isset($product)) readonly @endif
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('code')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    {{-- Serial Number --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Serial Number
        </label>

        <input
            type="text"
            name="serial_number"
            value="{{ old('serial_number', $product->serial_number ?? '') }}"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('serial_number')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    {{-- Asset Name --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Asset Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    {{-- Brand --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Brand
        </label>

        <input
            type="text"
            name="brand"
            value="{{ old('brand', $product->brand ?? '') }}"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('brand')
            <small class="text-red-500">{{ $message }}</small>
        @enderror
    </div>

    {{-- Category --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Category
        </label>

        <select
            name="category_id"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(old('category_id', $product->category_id ?? '') == $category->id)>

                    {{ $category->name }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Location --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Location
        </label>

        <select
            name="location_id"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach($locations as $location)

                <option
                    value="{{ $location->id }}"
                    @selected(old('location_id', $product->location_id ?? '') == $location->id)>

                    {{ $location->name }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Unit --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Unit
        </label>

        <select
            name="unit"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach(['Unit','Pcs','Box'] as $unit)

                <option
                    value="{{ $unit }}"
                    @selected(old('unit', $product->unit ?? 'Unit') == $unit)>

                    {{ $unit }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Stock --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Stock
        </label>

        <input
    type="number"
    min="0"
    name="stock"
    value="{{ old('stock', $product->stock ?? 0) }}"
    class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

<p class="mt-1 text-sm text-slate-500">
    Enter the current available stock.
</p>
    </div>

    {{-- Minimum Stock --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Minimum Stock
        </label>

        <input
    type="number"
    min="0"
    name="minimum_stock"
    value="{{ old('minimum_stock', $product->minimum_stock ?? 5) }}"
    class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

<p class="mt-1 text-sm text-slate-500">
    The system will notify when stock reaches this limit.
</p>
    </div>

    {{-- Condition --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Condition
        </label>

        <select
            name="condition"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach(['Good','Fair','Damaged','Lost'] as $condition)

                <option
                    value="{{ $condition }}"
                    @selected(old('condition', $product->condition ?? 'Good') == $condition)>

                    {{ $condition }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Status --}}
    <div>
        <label class="block mb-2 font-semibold text-slate-700">
            Status
        </label>

        <select
            name="status"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach(['Available','Maintenance'] as $status)

                <option
                    value="{{ $status }}"
                    @selected(old('status', $product->status ?? 'Available') == $status)>

                    {{ $status }}

                </option>

            @endforeach

        </select>
    </div>

    {{-- Image --}}
<div class="md:col-span-2">

    <label class="block mb-2 font-semibold text-slate-700">
        Asset Image
    </label>

    <input
        type="file"
        id="image"
        name="image"
        accept="image/*"
        class="w-full rounded-xl border border-slate-300 p-3">

    <div class="mt-5">

        <img
            id="preview"
            src="{{ isset($product) && $product->image ? asset('storage/'.$product->image) : asset('images/no-image.png') }}"
            class="w-40 h-40 object-cover rounded-2xl shadow border">

    </div>

</div>

    {{-- Description --}}
    <div class="md:col-span-2">

        <label class="block mb-2 font-semibold text-slate-700">
            Description
        </label>

        <textarea
    rows="5"
    name="description"
    placeholder="Enter additional information about this asset..."
    class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

</div>

<div class="flex justify-end gap-3 mt-8">

    <a
        href="{{ route('dashboard.inventory.index') }}"
        class="px-6 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 transition">

        Cancel

    </a>

    <button
        type="submit"
        class="px-8 py-3 rounded-xl bg-fuchsia-600 text-white font-semibold hover:bg-fuchsia-700 transition">

        <i class="fa-solid fa-floppy-disk mr-2"></i>

        {{ isset($product) ? 'Update Asset' : 'Save Asset' }}

    </button>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const input = document.getElementById('image');
    const preview = document.getElementById('preview');

    input.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) return;

        preview.src = URL.createObjectURL(file);

    });

});
</script>

</div>