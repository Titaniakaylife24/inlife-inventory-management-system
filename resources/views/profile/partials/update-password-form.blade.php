<div class="bg-white rounded-3xl shadow p-8"
     x-data="{
        current:false,
        password:false,
        confirm:false
     }">

    <h2 class="text-2xl font-bold mb-6">
        Change Password
    </h2>

    <form method="POST" action="{{ route('password.update') }}">

        @csrf
        @method('PUT')

        {{-- Current Password --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                Current Password
            </label>

            <div class="relative">

                <input
                    :type="current ? 'text' : 'password'"
                    name="current_password"
                    class="w-full rounded-xl border-slate-300 pr-14">

                <button
                    type="button"
                    @click="current=!current"
                    class="absolute right-4 top-1/2 -translate-y-1/2">

                    <img
                        :src="current
                            ? '{{ asset('images/kebuka.png') }}'
                            : '{{ asset('images/ketutup3.png') }}'"
                        class="w-6 h-6">

                </button>

            </div>

            @error('current_password')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- New Password --}}
        <div class="mb-6">

            <label class="block mb-2 font-semibold">
                New Password
            </label>

            <div class="relative">

                <input
                    :type="password ? 'text' : 'password'"
                    name="password"
                    class="w-full rounded-xl border-slate-300 pr-14">

                <button
                    type="button"
                    @click="password=!password"
                    class="absolute right-4 top-1/2 -translate-y-1/2">

                    <img
                        :src="password
                            ? '{{ asset('images/kebuka.png') }}'
                            : '{{ asset('images/ketutup3.png') }}'"
                        class="w-6 h-6">

                </button>

            </div>

            @error('password')
                <p class="text-red-500 text-sm mt-2">
                    {{ $message }}
                </p>
            @enderror

        </div>

        {{-- Confirm Password --}}
        <div class="mb-8">

            <label class="block mb-2 font-semibold">
                Confirm New Password
            </label>

            <div class="relative">

                <input
                    :type="confirm ? 'text' : 'password'"
                    name="password_confirmation"
                    class="w-full rounded-xl border-slate-300 pr-14">

                <button
                    type="button"
                    @click="confirm=!confirm"
                    class="absolute right-4 top-1/2 -translate-y-1/2">

                    <img
                        :src="confirm
                            ? '{{ asset('images/kebuka.png') }}'
                            : '{{ asset('images/ketutup3.png') }}'"
                        class="w-6 h-6">

                </button>

            </div>

        </div>

        <button
            type="submit"
            class="px-6 py-3 rounded-xl text-white font-semibold
            bg-gradient-to-r from-pink-500 to-purple-600 hover:opacity-90 transition">

            <i class="fa-solid fa-lock mr-2"></i>

            Update Password

        </button>

    </form>

</div>