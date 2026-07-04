@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')

<x-page-bg>

<div class="min-h-screen flex items-center justify-center px-6 py-12">

    <div class="w-full max-w-md">

        <div class="bg-white/90 backdrop-blur-xl rounded-[32px] shadow-xl border border-white/70 p-8">

            <div class="text-center">

                <img src="{{ asset('images/logo_inlife.png') }}"
                     class="w-20 mx-auto mb-5">

                <h2 class="text-4xl font-black text-slate-800">
                    Forgot Password
                </h2>

                <p class="mt-3 text-slate-500">
                    Enter your email address and we'll send you a password reset link.
                </p>

            </div>

            <x-auth-session-status class="mt-6 mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">

                @csrf

                <div>

                    <label class="block mb-2 text-sm font-semibold text-slate-700">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="Enter your email..."
                        class="w-full px-5 py-3 rounded-xl border border-slate-300
                               focus:border-fuchsia-500
                               focus:ring-2
                               focus:ring-fuchsia-300
                               outline-none">

                    @error('email')
                        <p class="mt-2 text-sm text-red-500">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                <button
                    type="submit"
                    class="w-full py-3 rounded-xl text-white font-bold
                           bg-gradient-to-r
                           from-pink-500
                           via-fuchsia-500
                           to-violet-600
                           hover:from-pink-600
                           hover:via-fuchsia-600
                           hover:to-violet-700
                           transition">

                    Send Reset Link

                </button>

            </form>

            <div class="mt-6 text-center">

                <a href="{{ route('login') }}"
                   class="text-fuchsia-600 hover:text-violet-600 font-semibold">

                    ← Back to Login

                </a>

            </div>

        </div>

    </div>

</div>

</x-page-bg>

@endsection