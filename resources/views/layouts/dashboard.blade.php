<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | InLife Inventory Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100 dark:bg-gray-900">

<div class="flex min-h-screen">

    @include('components.sidebar')

    <div class="flex flex-col flex-1">

        @include('components.topbar')

        <main class="flex-1 p-8">

            @yield('content')

        </main>

        @include('components.footer')

    </div>

</div>

</body>

</html>