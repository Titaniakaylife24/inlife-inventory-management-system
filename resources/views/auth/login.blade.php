@extends('layouts.auth')

@section('title', 'Login')

@section('content')

<x-page-bg>

<div class="h-screen overflow-hidden">

    <div class="grid lg:grid-cols-[1.1fr_0.9fr] h-full">

        {{-- ================= LEFT ================= --}}
        <div class="hidden lg:flex items-center justify-center px-12">

            <div class="max-w-lg text-center">

                {{-- Logo --}}
                <img
                    src="{{ asset('images/logo_inlife.png') }}"
                    class="w-28 mx-auto mb-8">

                {{-- Maskot --}}
                <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-xl p-5 inline-block">

                    <img
                        src="{{ asset('images/maskot_login.gif') }}"
                        class="w-72 floating mx-auto">

                </div>

                {{-- Title --}}
                <h1 class="mt-8 text-6xl font-black leading-none">

    Welcome

</h1>

<h2
class="mt-1
text-6xl
font-black
bg-gradient-to-r
from-fuchsia-600
via-pink-500
to-violet-600
bg-clip-text
text-transparent">

Back!

</h2>

                <p class="mt-5 text-slate-600 text-lg leading-8">
                    Kelola inventaris perusahaan dengan lebih mudah,
                    pantau aset secara real-time,
                    dan tingkatkan efisiensi pekerjaan.
                </p>

            </div>

        </div>

        {{-- ================= RIGHT ================= --}}
        <div class="flex items-center justify-center px-10 lg:pr-40">

            <div class="w-full max-w-md">

                <div
                    class="bg-white/90
                    backdrop-blur-xl
                    rounded-[32px]
                    border border-white/70
                    shadow-[0_20px_60px_rgba(15,23,42,0.12)]
                    p-8">

                    <div class="text-center">

                        <img
                            src="{{ asset('images/logo_inlife.png') }}"
                            class="w-20 mx-auto mb-5">
                        

                        <h2 class="text-4xl font-black text-slate-800">
                            Login
                        </h2>

                        <p class="mt-2 text-slate-500">
                            Selamat datang kembali 👋
                        </p>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                        class="mt-8 space-y-5">

                        @csrf

                                                {{-- ================= EMAIL ================= --}}
                        <div>

                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Email
                            </label>

<input
    type="email"
    name="email"
    value="{{ old('email') }}"
    placeholder="Masukkan email..."
    required
    class="w-full px-5 py-3 rounded-xl
    border border-slate-300
    focus:border-fuchsia-500
    focus:ring-2
    focus:ring-fuchsia-300
    outline-none
    transition">

                            @error('email')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        {{-- ================= PASSWORD ================= --}}
                        <div>

                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Password
                            </label>

                            <div class="relative">

                                <input

                                    id="password"

                                    type="password"

                                    name="password"

                                    required

                                    placeholder="Masukkan password..."

                                    class="w-full pl-5 pr-14 py-3 rounded-xl
                                    border border-slate-300
                                    focus:border-fuchsia-500
                                    focus:ring-2
                                    focus:ring-fuchsia-300
                                    outline-none
                                    transition">

                                <button

                                    type="button"

                                    onclick="togglePassword()"

                                    class="absolute right-4 top-1/2 -translate-y-1/2">

                                    <img

                                        id="eyeIcon"

                                        src="{{ asset('images/ketutup3.png') }}"

                                        class="w-6 h-6">

                                </button>

                            </div>

                            @error('password')

                                <p class="text-sm text-red-500 mt-2">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                        {{-- Remember --}}
                        <div class="flex items-center justify-between">

                            <label class="flex items-center gap-2 text-sm text-slate-600">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-slate-300">

                                Remember Me

                            </label>

                            @if(Route::has('password.request'))

                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-fuchsia-600 hover:text-violet-600 transition">

                                    Lupa Password?

                                </a>

                            @endif

                        </div>

                        {{-- Login --}}
                        <button

                            id="loginBtn"

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

                            Login

                        </button>

                        <p class="text-center text-sm text-slate-500">

                            Belum punya akun?

                            <a
                                href="{{ route('register') }}"
                                class="font-semibold text-fuchsia-600 hover:text-violet-600 transition">

                                Register

                            </a>

                        </p>

                                            </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

@keyframes floating {

    0%,100%{
        transform:translateY(0px);
    }

    50%{
        transform:translateY(-12px);
    }

}

.floating{

    animation:floating 3s ease-in-out infinite;

}

</style>

<script>

function togglePassword(){

    const password=document.getElementById('password');
    const eye=document.getElementById('eyeIcon');

    if(password.type==="password"){

        password.type="text";
        eye.src="{{ asset('images/kebuka.png') }}";

    }else{

        password.type="password";
        eye.src="{{ asset('images/ketutup3.png') }}";

    }

}

// Loading Button
document.querySelector('form').addEventListener('submit',function(){

    const btn=document.getElementById('loginBtn');

    btn.disabled=true;

    btn.innerHTML=`
        <svg class="animate-spin inline w-5 h-5 mr-2"
             xmlns="http://www.w3.org/2000/svg"
             fill="none"
             viewBox="0 0 24 24">

            <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4">
            </circle>

            <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z">
            </path>

        </svg>

        Logging in...

    `;

});

</script>

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded',function(){

    Swal.fire({

        icon:'success',

        title:'Registrasi Berhasil 🎉',

        text:'Silakan login menggunakan akun yang baru didaftarkan.',

        confirmButtonText:'Login',

        confirmButtonColor:'#d946ef',

        background:'#ffffff',

        customClass:{
            popup:'rounded-3xl'
        }

    });

});

</script>

@endif

</x-page-bg>

@endsection