@props([

'variant'=>'primary'

])

@php

$badge = match($variant){

'success'=>'bg-green-100 text-green-600',

'danger'=>'bg-red-100 text-red-600',

'warning'=>'bg-yellow-100 text-yellow-700',

default=>'bg-pink-100 text-pink-600'

};

@endphp

<span

class="px-3 py-1 rounded-full text-sm font-semibold {{ $badge }}"

>

{{ $slot }}

</span>