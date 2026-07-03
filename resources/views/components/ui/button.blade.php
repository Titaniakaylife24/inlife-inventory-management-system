@props([
    'variant' => 'primary',
    'type' => 'button',
])

@php
$classes = match($variant) {

    'primary' =>
        'bg-gradient-to-r from-pink-500 to-purple-600 text-white hover:opacity-90',

    'secondary' =>
        'bg-slate-100 text-slate-700 hover:bg-slate-200',

    'success' =>
        'bg-emerald-500 text-white hover:bg-emerald-600',

    'danger' =>
        'bg-red-500 text-white hover:bg-red-600',

    'warning' =>
        'bg-amber-500 text-white hover:bg-amber-600',

    default =>
        'bg-pink-500 text-white'

};
@endphp

<button

type="{{ $type }}"

{{ $attributes->merge([

'class'=>

'px-5 py-3 rounded-xl font-semibold transition duration-300 shadow hover:scale-105 '.$classes

]) }}

>

{{ $slot }}

</button>