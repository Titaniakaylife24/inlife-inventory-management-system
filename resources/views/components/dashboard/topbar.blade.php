<header
class="h-20
bg-white
border-b
border-slate-200
flex
items-center
justify-between
px-8
shadow-sm">

    {{-- LEFT --}}
    <div class="flex items-center gap-6">

        {{-- Sidebar --}}
        <button
            @click="openSidebar=!openSidebar"
            class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 transition">

            <i class="fa-solid fa-bars text-xl text-slate-700"></i>

        </button>

        {{-- Greeting --}}
        <div>

            <h1 class="text-2xl font-black text-slate-800">

                Good

                @php
                    $hour = now()->format('H');

                    if($hour < 12){
                        echo "Morning ☀️";
                    }elseif($hour < 17){
                        echo "Afternoon 🌤️";
                    }else{
                        echo "Evening 🌙";
                    }
                @endphp

            </h1>

            <p class="text-slate-500">

                Welcome back,

                <span class="font-semibold text-fuchsia-600">

                    {{ Auth::user()->name }}

                </span>

            </p>

        </div>

    </div>

    {{-- RIGHT --}}
    <div class="flex items-center gap-5">

        {{-- Date --}}
<div class="hidden md:block text-right">

    <h3 class="font-bold text-slate-700">
        {{ now()->format('F d, Y') }}
    </h3>

    <p class="text-sm text-slate-500">
        {{ now()->format('l') }}
    </p>

</div>
        {{-- Profile --}}
        <a
            href="{{ route('profile.edit') }}"
            class="flex items-center gap-3
            bg-slate-100
            hover:bg-slate-200
            rounded-2xl
            px-4
            py-2
            transition">

            <div
                class="w-11
                h-11
                rounded-full
                bg-gradient-to-r
                from-pink-500
                to-purple-600
                flex
                items-center
                justify-center
                text-white
                font-bold
                text-lg">

                {{ strtoupper(substr(Auth::user()->name,0,1)) }}

            </div>

            <div class="hidden xl:block">

                <h3 class="font-semibold text-slate-800">

                    {{ Auth::user()->name }}

                </h3>

                <p class="text-sm text-slate-500">

                    {{ Auth::user()->role->name }}

                </p>

            </div>

            <i class="fa-solid fa-chevron-right text-slate-400"></i>

        </a>

    </div>

</header>