<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    {{-- Name --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Full Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $user->name ?? '') }}"
            placeholder="Enter full name"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('name')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Email --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Email
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email', $user->email ?? '') }}"
            placeholder="example@inlife.com"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('email')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Role --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Role
        </label>

        <select
            name="role_id"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

            @foreach($roles as $role)

                <option
                    value="{{ $role->id }}"
                    @selected(old('role_id', $user->role_id ?? '') == $role->id)>

                    {{ $role->name }}

                </option>

            @endforeach

        </select>

        @error('role_id')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Password --}}
    <div>

        <label class="block mb-2 font-semibold text-slate-700">
            Password

            @isset($user)
                <span class="text-sm font-normal text-slate-400">
                    (Leave blank if unchanged)
                </span>
            @endisset

        </label>

        <input
            type="password"
            name="password"
            placeholder="Minimum 8 characters"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

        @error('password')
            <small class="text-red-500">{{ $message }}</small>
        @enderror

    </div>

    {{-- Confirm Password --}}
    <div class="md:col-span-2">

        <label class="block mb-2 font-semibold text-slate-700">
            Confirm Password
        </label>

        <input
            type="password"
            name="password_confirmation"
            placeholder="Repeat password"
            class="w-full rounded-xl border-slate-300 focus:border-fuchsia-500 focus:ring-fuchsia-500">

    </div>

</div>

<div class="flex justify-end gap-3 mt-8">

    <a
        href="{{ route('users.index') }}"
        class="px-6 py-3 rounded-xl border border-slate-300 hover:bg-slate-100 transition">

        Cancel

    </a>

    <button
        type="submit"
        class="px-8 py-3 rounded-xl bg-fuchsia-600 text-white font-semibold hover:bg-fuchsia-700 transition">

        <i class="fa-solid fa-floppy-disk mr-2"></i>

        {{ isset($user) ? 'Update User' : 'Save User' }}

    </button>

</div>