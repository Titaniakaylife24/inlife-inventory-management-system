@extends('layouts.dashboard')

@section('title','Users')

@section('content')

@if(session('success'))
<div class="mb-6 rounded-xl bg-green-100 border border-green-200 p-4 text-green-700">
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 rounded-xl bg-red-100 border border-red-200 p-4 text-red-700">
    {{ session('error') }}
</div>
@endif

<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

        <div>
            <h1 class="text-3xl font-black text-slate-800">
                Users
            </h1>

            <p class="text-slate-500 mt-1">
                Manage system users and their roles.
            </p>
        </div>

        <a href="{{ route('users.create') }}"
        class="inline-flex items-center gap-2 rounded-xl bg-fuchsia-600 px-5 py-3 text-white font-semibold hover:bg-fuchsia-700 transition">

            <i class="fa-solid fa-plus"></i>

            Add User

        </a>

    </div>

    {{-- Search --}}
    <div class="bg-white rounded-2xl shadow-sm p-5">

        <form method="GET">

            <div class="flex gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search name or email..."
                    class="flex-1 rounded-xl border border-slate-300 px-4 py-3 focus:border-fuchsia-500 focus:ring-2 focus:ring-fuchsia-200 outline-none">

                <button
                    class="rounded-xl bg-slate-900 px-6 text-white hover:bg-slate-800">

                    Search

                </button>

                @if(request('search'))

                <a
                    href="{{ route('users.index') }}"
                    class="rounded-xl bg-slate-200 px-6 py-3 hover:bg-slate-300 transition">

                    Reset

                </a>

                @endif

            </div>

        </form>

    </div>

    {{-- Table --}}
    <div class="bg-white rounded-2xl shadow-sm overflow-hidden">

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr class="text-left text-slate-700">

                        <th class="px-6 py-4">Avatar</th>

                        <th class="px-6 py-4">Name</th>

                        <th class="px-6 py-4">Email</th>

                        <th class="px-6 py-4">Role</th>

                        <th class="px-6 py-4">Created</th>

                        <th class="px-6 py-4 text-center">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($users as $user)

                <tr class="border-t hover:bg-slate-50">

                    {{-- Avatar --}}
                    <td class="px-6 py-4">

                        <div class="w-12 h-12 rounded-full bg-fuchsia-100 flex items-center justify-center font-bold text-fuchsia-700">

                            {{ strtoupper(substr($user->name,0,1)) }}

                        </div>

                    </td>

                    {{-- Name --}}
                    <td class="px-6 py-4 font-semibold">

                        {{ $user->name }}

                    </td>

                    {{-- Email --}}
                    <td class="px-6 py-4">

                        {{ $user->email }}

                    </td>

                    {{-- Role --}}
                    <td class="px-6 py-4">

                        @if($user->role->name=='Admin')

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm">
                                Admin
                            </span>

                        @elseif($user->role->name=='Staff')

                            <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm">
                                Staff
                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm">
                                Employee
                            </span>

                        @endif

                    </td>

                    {{-- Created --}}
                    <td class="px-6 py-4">

                        {{ $user->created_at->format('d M Y') }}

                    </td>

                    {{-- Action --}}
                    <td class="px-6 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="{{ route('users.edit',$user) }}"
                            class="w-10 h-10 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-200">

                                <i class="fa-solid fa-pen"></i>

                            </a>

                            <form
                                action="{{ route('users.destroy',$user) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this user?')"
                                    class="w-10 h-10 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">

                                    <i class="fa-solid fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="6"
                    class="py-12 text-center text-slate-500">

                        No users found.

                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        <div class="p-5 border-t">

            {{ $users->links() }}

        </div>

    </div>

</div>

@endsection