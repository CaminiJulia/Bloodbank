<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bloodbank')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">

    <header class="bg-red-600 text-white p-4 text-center">
        <h1 class="text-xl font-bold">Bloodbank</h1>
    </header>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
