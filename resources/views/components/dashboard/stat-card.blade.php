<a href="{{ $link ?? '#' }}" class="block">

    <div
        class="bg-white rounded-3xl shadow-md
        hover:shadow-2xl hover:-translate-y-2
        transition duration-300 cursor-pointer p-6">

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

        <div class="mt-5 flex justify-end">

            <span
                class="text-sm text-fuchsia-600 font-semibold
                group-hover:translate-x-1 transition">

                View →

            </span>

        </div>

    </div>

</a>