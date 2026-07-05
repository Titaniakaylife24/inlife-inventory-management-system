<div class="space-y-6">

    {{-- Location Name --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Location Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $location->name ?? '') }}"
            placeholder="Example: Warehouse A"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Description --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            placeholder="Enter location description..."
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">{{ old('description', $location->description ?? '') }}</textarea>

        @error('description')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

</div>

<div class="flex justify-end gap-3 mt-8">

    <a
        href="{{ route('location.index') }}"
        class="px-6 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 transition">

        Cancel

    </a>

    <button
        type="submit"
        class="px-8 py-3 rounded-xl bg-fuchsia-600 text-white font-semibold hover:bg-fuchsia-700 transition">

        <i class="fa-solid fa-floppy-disk mr-2"></i>

        {{ isset($location) ? 'Update Location' : 'Save Location' }}

    </button>

</div>