@extends('layouts.dashboard')

@section('title','Locations')

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

                Locations

            </h1>

            <p class="text-slate-500 mt-1">

                Manage company locations.

            </p>

        </div>

        <a
            href="{{ route('location.create') }}"
            class="inline-flex items-center gap-2 rounded-xl bg-fuchsia-600 px-5 py-3 text-white font-semibold hover:bg-fuchsia-700 transition">

            <i class="fa-solid fa-plus"></i>

            Add Location

        </a>

    </div>

    {{-- Search --}}
    <div class="bg-white rounded-2xl shadow-sm p-5">

        <form method="GET">

            <div class="flex flex-col md:flex-row gap-3">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search location..."
                    class="flex-1 rounded-xl border border-slate-300 px-4 py-3
                    focus:border-fuchsia-500
                    focus:ring-2
                    focus:ring-fuchsia-200
                    outline-none">

                <button
                    type="submit"
                    class="rounded-xl bg-slate-900 px-6 py-3 text-white hover:bg-slate-800 transition">

                    <i class="fa-solid fa-magnifying-glass mr-2"></i>

                    Search

                </button>

                @if(request()->filled('search'))

                <a
                    href="{{ route('location.index') }}"
                    class="rounded-xl bg-slate-200 px-6 py-3 text-slate-700 hover:bg-slate-300 transition text-center">

                    <i class="fa-solid fa-rotate-left mr-2"></i>

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

                        <th class="px-6 py-4">
                            No
                        </th>

                        <th class="px-6 py-4">
                            Location
                        </th>

                        <th class="px-6 py-4">
                            Description
                        </th>

                        <th class="px-6 py-4 text-center">
                            Total Assets
                        </th>

                        <th class="px-6 py-4 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($locations as $location)

                    <tr class="border-t hover:bg-slate-50">

                        <td class="px-6 py-4 font-semibold">

                            {{ $loop->iteration + ($locations->firstItem() - 1) }}

                        </td>

                        <td class="px-6 py-4">

                            <div class="font-semibold text-slate-800">

                                {{ $location->name }}

                            </div>

                        </td>

                        <td class="px-6 py-4 text-slate-600">

                            {{ $location->description ?: '-' }}

                        </td>

                        <td class="px-6 py-4 text-center">

                            <span class="px-3 py-1 rounded-full bg-sky-100 text-sky-700 font-semibold">

                                {{ $location->products_count }}

                            </span>

                        </td>

                        <td class="px-6 py-4">

                            <div class="flex justify-center gap-2">

                                {{-- Edit --}}
                                <a
                                    href="{{ route('location.edit',$location) }}"
                                    class="w-10 h-10 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-200">

                                    <i class="fa-solid fa-pen"></i>

                                </a>

                                {{-- Delete --}}
                                <form
                                    action="{{ route('location.destroy',$location) }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this location?')"
                                        class="w-10 h-10 rounded-lg bg-red-100 text-red-600 hover:bg-red-200">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-12 text-slate-500">

                            No location found.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="p-5 border-t">

            {{ $locations->withQueryString()->links() }}

        </div>

    </div>

</div>

@endsection