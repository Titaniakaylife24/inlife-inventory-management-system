@extends('layouts.auth')

@section('title','Register')

@section('content')

<x-page-bg>

<div class="h-full">

    <div class="grid lg:grid-cols-[1.1fr_0.9fr] h-full">

        {{-- ================= LEFT ================= --}}
        <div class="hidden lg:flex items-center justify-center px-12">

            <div class="max-w-lg text-center">

                <img
                    src="{{ asset('images/logo_inlife.png') }}"
                    class="w-28 mx-auto mb-8">

                <div class="bg-white/70 backdrop-blur-xl rounded-3xl shadow-xl p-5 inline-block">

                    <img
                        src="{{ asset('images/maskot_login.gif') }}"
                        class="w-96 floating mx-auto">

                </div>

                <div class="mt-8 flex justify-center">

</div>

<h1 class="mt-8 text-6xl font-black leading-tight text-slate-800">

    Join

    <span
        class="bg-gradient-to-r
        from-fuchsia-600
        via-pink-500
        to-violet-600
        bg-clip-text
        text-transparent">

        InLife

    </span>

</h1>

<h2 class="mt-2 text-3xl font-bold text-slate-700">

    Inventory Management

</h2>

<p class="mt-6 text-lg leading-8 text-slate-600">

    Kelola inventaris perusahaan dengan lebih cepat,
    pantau aset secara real-time,
    dan tingkatkan produktivitas
    dalam satu platform modern.

</p>

            </div>

        </div>

        {{-- ================= RIGHT ================= --}}
        <div class="flex items-center justify-center px-8 lg:pr-24 lg:pt-8">

            <div class="w-full max-w-xl">

                <div class="bg-white/90 backdrop-blur-xl rounded-[32px] border border-white/60 shadow-[0_20px_60px_rgba(15,23,42,0.12)] p-7">

                    <div class="text-center">

                        <img
                            src="{{ asset('images/logo_inlife.png') }}"
                            class="w-20 mx-auto mb-5">

                        <h2 class="text-3xl font-black text-slate-800">
                            Create Account
                        </h2>

                        <p class="mt-2 text-slate-500">
                            Daftar untuk mulai menggunakan InLife 🚀
                        </p>

                    </div>

                    <form
                        method="POST"
                        action="{{ route('register') }}"
                        class="mt-8 space-y-3">

                        @csrf

                                                {{-- ================= NAME ================= --}}
                        <div>

                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="Masukkan nama lengkap..."
                                class="w-full px-5 py-3 rounded-xl border border-slate-300
                                focus:border-fuchsia-500
                                focus:ring-2
                                focus:ring-fuchsia-300
                                outline-none transition">

                            @error('name')
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- ================= EMAIL ================= --}}
                        <div>

                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="Masukkan email..."
                                class="w-full px-5 py-3 rounded-xl border border-slate-300
                                focus:border-fuchsia-500
                                focus:ring-2
                                focus:ring-fuchsia-300
                                outline-none transition">

                            @error('email')
                                <p class="text-red-500 text-sm mt-2">
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
                                    class="w-full px-5 py-3 pr-14 rounded-xl border border-slate-300
                                    focus:border-fuchsia-500
                                    focus:ring-2
                                    focus:ring-fuchsia-300
                                    outline-none transition">

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
                                <p class="text-red-500 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                        {{-- ================= CONFIRM PASSWORD ================= --}}
                        <div>

                            <label class="block mb-2 text-sm font-semibold text-slate-700">
                                Konfirmasi Password
                            </label>

                            <div class="relative">

                                <input
                                    id="confirmPassword"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    placeholder="Ulangi password..."
                                    class="w-full px-5 py-3 pr-14 rounded-xl border border-slate-300
                                    focus:border-fuchsia-500
                                    focus:ring-2
                                    focus:ring-fuchsia-300
                                    outline-none transition">

                                <button
                                    type="button"
                                    onclick="toggleConfirmPassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2">

                                    <img
                                        id="confirmEyeIcon"
                                        src="{{ asset('images/ketutup3.png') }}"
                                        class="w-6 h-6">

                                </button>

                            </div>

                            <p
                                id="passwordMatch"
                                class="text-sm mt-2 hidden">
                            </p>

                        </div>

                                                {{-- ================= Password Strength ================= --}}
                        <div>

                            <div class="w-full h-2 bg-slate-200 rounded-full overflow-hidden">

                                <div
                                    id="strengthBar"
                                    class="h-full w-0 rounded-full transition-all duration-300">
                                </div>

                            </div>

                            <p
                                id="strengthText"
                                class="text-sm mt-2 text-slate-500">
                                Gunakan minimal 8 karakter.
                            </p>

                        </div>

                        {{-- ================= Register Button ================= --}}
                        <button

                            id="registerBtn"

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

                            Create Account

                        </button>

                        {{-- Divider --}}
                        <div class="flex items-center gap-4">

                            <div class="flex-1 h-px bg-slate-200"></div>

                            <span class="text-sm text-slate-400">
                                atau
                            </span>

                            <div class="flex-1 h-px bg-slate-200"></div>

                        </div>

                        {{-- Login --}}
                        <p class="text-center text-sm text-slate-500">

                            Sudah punya akun?

                            <a
                                href="{{ route('login') }}"
                                class="font-semibold text-fuchsia-600 hover:text-violet-700 transition">

                                Login

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

// ================= PASSWORD =================

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

// ================= CONFIRM PASSWORD =================

function toggleConfirmPassword(){

    const password=document.getElementById('confirmPassword');
    const eye=document.getElementById('confirmEyeIcon');

    if(password.type==="password"){

        password.type="text";
        eye.src="{{ asset('images/kebuka.png') }}";

    }else{

        password.type="password";
        eye.src="{{ asset('images/ketutup3.png') }}";

    }

}

// ================= PASSWORD STRENGTH =================

const password=document.getElementById('password');
const bar=document.getElementById('strengthBar');
const text=document.getElementById('strengthText');

password.addEventListener('input',function(){

    let value=password.value;
    let score=0;

    if(value.length>=8) score++;
    if(/[A-Z]/.test(value)) score++;
    if(/[0-9]/.test(value)) score++;
    if(/[^A-Za-z0-9]/.test(value)) score++;

    if(score==0){

        bar.style.width="0%";
        bar.className="h-full rounded-full";

        text.innerHTML="Gunakan minimal 8 karakter.";
        text.className="text-sm mt-2 text-slate-500";

    }

    if(score==1){

        bar.style.width="25%";
        bar.className="h-full rounded-full bg-red-500";

        text.innerHTML="Password Lemah";
        text.className="text-sm mt-2 text-red-500";

    }

    if(score==2){

        bar.style.width="50%";
        bar.className="h-full rounded-full bg-yellow-500";

        text.innerHTML="Password Cukup";
        text.className="text-sm mt-2 text-yellow-600";

    }

    if(score==3){

        bar.style.width="75%";
        bar.className="h-full rounded-full bg-blue-500";

        text.innerHTML="Password Baik";
        text.className="text-sm mt-2 text-blue-600";

    }

    if(score==4){

        bar.style.width="100%";
        bar.className="h-full rounded-full bg-green-500";

        text.innerHTML="Password Sangat Kuat";
        text.className="text-sm mt-2 text-green-600";

    }

});

// ================= MATCH PASSWORD =================

const confirmPassword=document.getElementById('confirmPassword');
const match=document.getElementById('passwordMatch');

confirmPassword.addEventListener('keyup',function(){

    if(confirmPassword.value==""){

        match.classList.add('hidden');
        return;

    }

    match.classList.remove('hidden');

    if(password.value===confirmPassword.value){

        match.innerHTML="✔ Password cocok";
        match.className="text-sm mt-2 text-green-600";

    }else{

        match.innerHTML="✖ Password tidak sama";
        match.className="text-sm mt-2 text-red-600";

    }

});

// ================= LOADING BUTTON =================

document.querySelector('form').addEventListener('submit',function(){

    const btn=document.getElementById('registerBtn');

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
    stroke-width="4"/>

    <path
    class="opacity-75"
    fill="currentColor"
    d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"/>

    </svg>

    Creating Account...
    `;

});

</script>

</x-page-bg>

@endsection