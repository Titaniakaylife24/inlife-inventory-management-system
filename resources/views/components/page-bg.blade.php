<section {{ $attributes->merge([
'class' => 'relative overflow-hidden min-h-screen bg-gradient-to-br from-pink-50 via-white to-purple-100'
]) }}>

    <div class="absolute top-0 left-0 w-80 h-80 bg-pink-400/20 rounded-full blur-3xl"></div>

    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full blur-3xl"></div>

    <div class="relative z-10">
        {{ $slot }}
    </div>

</section>