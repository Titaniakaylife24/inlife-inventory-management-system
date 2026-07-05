<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | InLife IMS</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body x-data="{ openSidebar: true }" class="bg-slate-100">

<div class="flex h-screen overflow-hidden">

    @php
    $role = Auth::user()->role->name;
@endphp

@if($role == 'Admin')
    @include('components.dashboard.sidebar-admin')

@elseif($role == 'Staff')
    @include('components.dashboard.sidebar-staff')

@elseif($role == 'Manager')
    @include('components.dashboard.sidebar-manager')

@elseif($role == 'Employee')
    @include('components.dashboard.sidebar')

@endif

    <div class="flex flex-col flex-1 overflow-hidden">

        @include('components.dashboard.topbar')

        <main class="flex-1 overflow-y-auto p-8 bg-slate-100">
            @yield('content')
        </main>

    </div>

</div>

</body>

@if(session('success'))
<script>
document.addEventListener('DOMContentLoaded', function () {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '{{ session('success') }}',
        confirmButtonColor: '#a21caf'
    });
});
</script>
@endif

</html>