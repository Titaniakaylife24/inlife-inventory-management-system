<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>InLife Inventory Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white">

    @include('components.landing.navbar')
    @include('components.landing.hero')
    @include('components.landing.inventory')
    @include('components.landing.roles')
    @include('components.landing.reports')
    @include('components.landing.about')

    @include('components.cta')
    @include('dashboard.footer')

</body>

</html>