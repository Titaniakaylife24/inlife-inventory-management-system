<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | InLife IMS</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-slate-50 text-slate-800">

    @include('components.landing.navbar')

    @include('components.landing.inventory-section')

    @include('components.cta')

    @include('components.dashboard.footer')

</body>
</html>