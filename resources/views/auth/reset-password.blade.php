@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

<x-page-bg>

<div class="min-h-screen flex items-center justify-center py-20">

    <div class="w-full max-w-lg">

        <div class="bg-white/90 backdrop-blur-xl rounded-[32px] shadow-xl p-8">

            <div class="text-center">

                <img
                    src="{{ asset('images/logo_inlife.png') }}"
                    class="w-20 mx-auto mb-5">

                <h2 class="text-4xl font-black text-slate-800">
                    Reset Password
                </h2>

                <p class="mt-2 text-slate-500">
                    Masukkan password baru untuk akunmu.
                </p>

            </div>

            <form
                method="POST"
                action="{{ route('password.store') }}"
                class="mt-8 space-y-5">

                @csrf

                <input
                    type="hidden"
                    name="token"
                    value="{{ $request->route('token') }}">

                {{-- Email --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $request->email) }}"
                        required
                        class="w-full px-5 py-3 rounded-xl border border-slate-300 focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-300 outline-none">

                    @error('email')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Password Baru --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Password Baru
                    </label>

                    <div class="relative">

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            class="w-full pl-5 pr-14 py-3 rounded-xl
                            border border-slate-300
                            focus:border-fuchsia-500
                            focus:ring-2
                            focus:ring-fuchsia-300
                            outline-none">

                        <button
                            type="button"
                            onclick="togglePassword('password','eyeIconPassword')"
                            class="absolute right-4 top-1/2 -translate-y-1/2">

                            <img
                                id="eyeIconPassword"
                                src="{{ asset('images/ketutup3.png') }}"
                                class="w-6 h-6">

                        </button>

                    </div>

                    @error('password')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Konfirmasi Password --}}
                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Konfirmasi Password
                    </label>

                    <div class="relative">

                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full pl-5 pr-14 py-3 rounded-xl
                            border border-slate-300
                            focus:border-fuchsia-500
                            focus:ring-2
                            focus:ring-fuchsia-300
                            outline-none">

                        <button
                            type="button"
                            onclick="togglePassword('password_confirmation','eyeIconConfirm')"
                            class="absolute right-4 top-1/2 -translate-y-1/2">

                            <img
                                id="eyeIconConfirm"
                                src="{{ asset('images/ketutup3.png') }}"
                                class="w-6 h-6">

                        </button>

                    </div>

                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                </div>

                {{-- Button --}}
                <button
                    type="submit"
                    class="w-full py-3 rounded-xl
                    text-white
                    font-bold
                    bg-gradient-to-r
                    from-pink-500
                    via-fuchsia-500
                    to-violet-600
                    hover:from-pink-600
                    hover:via-fuchsia-600
                    hover:to-violet-700
                    hover:shadow-xl
                    hover:-translate-y-1
                    transition-all duration-300">

                    Reset Password

                </button>

            </form>

        </div>

    </div>

</div>

<script>

function togglePassword(inputId, eyeId){

    const password = document.getElementById(inputId);
    const eye = document.getElementById(eyeId);

    if(password.type === "password"){

        password.type = "text";
        eye.src = "{{ asset('images/kebuka.png') }}";

    }else{

        password.type = "password";
        eye.src = "{{ asset('images/ketutup3.png') }}";

    }

}

</script>

</x-page-bg>

@endsection