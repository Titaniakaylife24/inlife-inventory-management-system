@extends('layouts.dashboard')

@section('title','Edit Category')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="flex justify-between items-center mb-6">

        <div>

            <h1 class="text-3xl font-black">

                Edit Category

            </h1>

            <p class="text-slate-500 mt-2">

                Update category information.

            </p>

        </div>

        <a
            href="{{ route('category.index') }}"
            class="px-5 py-3 rounded-xl bg-slate-200 hover:bg-slate-300">

            Back

        </a>

    </div>

    <div class="bg-white rounded-3xl shadow p-8">

        <form
            action="{{ route('category.update',$category) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('dashboard.category._form')

        </form>

    </div>

</div>

@endsection