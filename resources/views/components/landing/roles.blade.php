<section id="roles" class="py-24 bg-white">

    @php

        $roles = [

            [
                'name' => 'Admin',
                'icon' => '👑',
                'color' => 'from-pink-500 to-fuchsia-600',
                'description' => 'Has full control over the Inventory Management System.',
                'features' => [
                    'Manage Inventory',
                    'Approve Borrow Requests',
                    'Manage Users',
                    'Generate Reports',
                ],
            ],

            [
                'name' => 'Staff',
                'icon' => '🛠️',
                'color' => 'from-blue-500 to-cyan-500',
                'description' => 'Responsible for day-to-day inventory operations and asset maintenance.',
                'features' => [
                    'Manage Inventory',
                    'Update Stock',
                    'Manage Categories',
                    'Manage Locations',
                ],
            ],

            [
                'name' => 'Manager',
                'icon' => '📊',
                'color' => 'from-purple-500 to-indigo-600',
                'description' => 'Monitor company assets through dashboards, reports, and stock monitoring.',
                'features' => [
                    'Dashboard Analytics',
                    'Stock Monitoring',
                    'View Reports',
                    'View Borrow Requests',
                ],
            ],

            [
                'name' => 'Employee',
                'icon' => '👤',
                'color' => 'from-emerald-500 to-green-600',
                'description' => 'Borrow company assets, monitor requests, and return borrowed items.',
                'features' => [
                    'Borrow Assets',
                    'Return Assets',
                    'Borrow History',
                    'Track Request Status',
                ],
            ],

        ];

    @endphp

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center">

            <span class="inline-flex px-4 py-2 rounded-full bg-pink-100 text-pink-600 font-semibold">
                User Access Levels
            </span>

            <h2 class="mt-6 text-5xl font-black text-slate-800">
                Role Access Management
            </h2>

            <p class="mt-4 text-slate-500 max-w-3xl mx-auto leading-8">
                Every user has different responsibilities and permissions.
                The Inventory Management System ensures secure access through
                role-based authorization.
            </p>

        </div>

        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-8 mt-16">

            @foreach($roles as $role)

                <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 p-8">

                    <div class="w-16 h-16 rounded-2xl bg-gradient-to-r {{ $role['color'] }}
                        flex items-center justify-center text-3xl text-white shadow-lg">

                        {{ $role['icon'] }}

                    </div>

                    <h3 class="mt-6 text-2xl font-bold text-slate-800">

                        {{ $role['name'] }}

                    </h3>

                    <p class="mt-4 text-slate-500 leading-7 min-h-[90px]">

                        {{ $role['description'] }}

                    </p>

                    <div class="border-t mt-6 pt-6">

                        <h4 class="font-semibold text-slate-700 mb-4">

                            Permissions

                        </h4>

                        <ul class="space-y-3">

                            @foreach($role['features'] as $feature)

                                <li class="flex items-center gap-3">

                                    <i class="fa-solid fa-circle-check text-green-500"></i>

                                    <span class="text-slate-700">

                                        {{ $feature }}

                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>