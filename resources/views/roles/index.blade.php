<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roles - InLife IMS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white">

@include('components.landing.navbar')

<x-page-bg>

    <div class="max-w-7xl mx-auto px-6">

        {{-- HERO --}}
        <div class="text-center">
            <div class="inline-flex px-4 py-2 rounded-full bg-purple-100 text-purple-600 text-sm font-semibold mb-6">
                👥 User Roles
            </div>

            <h1 class="text-5xl font-black">
                Role-Based Access Control
            </h1>

            <p class="mt-4 text-slate-500 max-w-3xl mx-auto">
                Each user has different responsibilities and permissions to ensure
                secure and efficient inventory management.
            </p>
        </div>

        {{-- ROLE CARDS --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-6 mt-16">

            @foreach([
                ['👑','Admin','Full system control, user management, and system settings.'],
                ['📊','Manager','Monitor analytics, reports, and operational performance.'],
                ['📦','Staff','Manage inventory, stock movement, and approvals.'],
                ['👤','Employee','Request and borrow company assets when needed.']
            ] as [$icon, $role, $desc])

            <div class="card-inlife p-8 text-center">
                <div class="text-5xl">{{ $icon }}</div>

                <h3 class="font-bold text-xl mt-4">
                    {{ $role }}
                </h3>

                <p class="mt-4 text-slate-500 text-sm leading-7">
                    {{ $desc }}
                </p>
            </div>

            @endforeach
        </div>

        {{-- PERMISSION MATRIX --}}
        <div class="card-inlife mt-20 p-8 overflow-x-auto">

            <h2 class="text-3xl font-bold mb-8">
                Permission Matrix
            </h2>

            <table class="w-full min-w-[700px]">
                <thead>
                    <tr class="border-b">
                        <th class="py-4 text-left">Feature</th>
                        <th>Admin</th>
                        <th>Manager</th>
                        <th>Staff</th>
                        <th>Employee</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    <tr class="border-b">
                        <td class="py-4 text-left">Manage Assets</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>—</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-4 text-left">View Reports</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>—</td>
                        <td>—</td>
                    </tr>

                    <tr class="border-b">
                        <td class="py-4 text-left">Borrow Assets</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                        <td>✅</td>
                    </tr>

                    <tr>
                        <td class="py-4 text-left">Manage Users</td>
                        <td>✅</td>
                        <td>—</td>
                        <td>—</td>
                        <td>—</td>
                    </tr>
                </tbody>
            </table>

        </div>

        {{-- WORKFLOW --}}
        <div class="mt-20">

            <h2 class="text-3xl font-bold text-center">
                Workflow by Role
            </h2>

            <p class="text-center text-slate-500 mt-3">
                Asset requests flow through multiple responsible roles.
            </p>

            <div class="grid md:grid-cols-4 gap-6 mt-10">

                <div class="card-inlife text-center p-6">
                    <div class="text-4xl">👤</div>
                    <h3 class="font-bold mt-4">Employee</h3>
                    <p class="text-slate-500 mt-2">Request Asset</p>
                </div>

                <div class="card-inlife text-center p-6">
                    <div class="text-4xl">📦</div>
                    <h3 class="font-bold mt-4">Staff</h3>
                    <p class="text-slate-500 mt-2">Approve Request</p>
                </div>

                <div class="card-inlife text-center p-6">
                    <div class="text-4xl">📊</div>
                    <h3 class="font-bold mt-4">Manager</h3>
                    <p class="text-slate-500 mt-2">Monitor Usage</p>
                </div>

                <div class="card-inlife text-center p-6">
                    <div class="text-4xl">👑</div>
                    <h3 class="font-bold mt-4">Admin</h3>
                    <p class="text-slate-500 mt-2">Audit System</p>
                </div>

            </div>
        </div>

    </div>

</x-page-bg>

@include('components.cta')
@include('components.dashboard.footer')

</body>
</html>