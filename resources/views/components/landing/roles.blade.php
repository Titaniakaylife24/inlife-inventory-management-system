<section id="roles" class="py-24 px-8 bg-white">

    <div class="max-w-7xl mx-auto">

        <h2 class="text-4xl font-bold mb-8">
            Role Access Management
        </h2>

        <div class="grid md:grid-cols-4 gap-6">

            @foreach([
                'Admin',
                'Staff',
                'Manager',
                'Employee'
            ] as $role)

            <div class="card-inlife text-center">

                <h3 class="font-bold text-xl mb-3">
                    {{ $role }}
                </h3>

                <p class="text-slate-500 text-sm">
                    Controlled system access based on responsibilities.
                </p>

            </div>

            @endforeach

        </div>

    </div>

</section>