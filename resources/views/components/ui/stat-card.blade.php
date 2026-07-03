@props([

'title',

'value',

'color'=>'pink'

])

<div

class="rounded-3xl p-6 text-white shadow-xl bg-{{ $color }}-500"

>

<p class="opacity-80">

{{ $title }}

</p>

<h2 class="text-4xl font-black mt-3">

{{ $value }}

</h2>

</div>