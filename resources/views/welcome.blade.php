<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>InLife Inventory Management System</title>

    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800 dark:bg-slate-900 dark:text-white">

    @include('components.navbar')

    @include('components.hero')

    @include('components.features')

    @include('components.statistics')

    @include('components.workflow')

    @include('components.footer')

</body>

</html>