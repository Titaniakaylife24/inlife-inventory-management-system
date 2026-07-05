<div class="space-y-6">

    {{-- Name --}}
    <div>

        <label class="block mb-2 font-semibold">

            Category Name

        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name',$category->name ?? '') }}"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Description --}}
    <div>

        <label class="block mb-2 font-semibold">

            Description

        </label>

        <textarea
            rows="5"
            name="description"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">{{ old('description',$category->description ?? '') }}</textarea>

    </div>

</div>

<div class="flex justify-end gap-3 mt-8">

    <a
        href="{{ route('category.index') }}"
        class="px-6 py-3 rounded-xl border">

        Cancel

    </a>

    <button
        class="px-8 py-3 rounded-xl bg-fuchsia-600 text-white hover:bg-fuchsia-700">

        <i class="fa-solid fa-floppy-disk mr-2"></i>

        {{ isset($category) ? 'Update Category' : 'Save Category' }}

    </button>

</div>