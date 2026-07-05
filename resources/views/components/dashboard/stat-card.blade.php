@if(isset($url))

<a href="{{ $url }}" class="block group">

@else

<div class="group">

@endif

    <div
        class="bg-white rounded-3xl shadow-md
        hover:shadow-2xl hover:-translate-y-2
        transition duration-300 p-6">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-slate-500 font-medium">
                    {{ $title }}
                </p>

                <h2 class="text-5xl font-black mt-2 text-slate-800">
                    {{ $value }}
                </h2>

            </div>

            <div
                class="w-20 h-20 rounded-3xl
                bg-gradient-to-r {{ $color }}
                text-white text-4xl
                flex items-center justify-center
                shadow-lg">

                {{ $icon }}

            </div>

        </div>

    </div>

@if(isset($url))

</a>

@else

</div>

@endif