<!DOCTYPE html>
<html>

<head>

<title>@yield('title')</title>

@vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>

@include('components.landing.navbar')

<main>

@yield('content')

</main>

@include('components.dashboard.footer')

</body>

</html>