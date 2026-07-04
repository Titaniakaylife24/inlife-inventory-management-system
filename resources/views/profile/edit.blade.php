@extends('layouts.dashboard')

@section('title','Profile')

@section('content')

<div class="max-w-5xl mx-auto space-y-8">

    {{-- Header --}}
    <div>

        <h1 class="text-3xl font-black">

            My Profile

        </h1>

        <p class="text-slate-500 mt-2">

            Manage your personal information and account settings.

        </p>

    </div>

    {{-- Profile Card --}}
    <div class="bg-white rounded-3xl shadow p-8">

        <div class="flex items-center gap-6">

            <div
                class="w-24 h-24 rounded-full
                bg-gradient-to-r
                from-pink-500
                to-purple-600
                flex items-center justify-center
                text-white text-4xl font-bold">

                {{ strtoupper(substr(auth()->user()->name,0,1)) }}

            </div>

            <div>

                <h2 class="text-2xl font-bold">

                    {{ auth()->user()->name }}

                </h2>

                <p class="text-slate-500">

                    {{ auth()->user()->email }}

                </p>

                <div class="mt-3 flex gap-3">

                    <span class="px-4 py-1 rounded-full bg-pink-100 text-pink-600">

                        {{ auth()->user()->role->name }}

                    </span>

                    <span class="px-4 py-1 rounded-full bg-slate-100">

                        Joined {{ auth()->user()->created_at->format('d M Y') }}

                    </span>

                </div>

            </div>

        </div>

    </div>

    {{-- Edit Profile --}}
    @include('profile.partials.update-profile-information-form')

    {{-- Change Password --}}
    @include('profile.partials.update-password-form')

</div>

@endsection