<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <link rel="icon" href="{{ asset('assets/aset-logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>
<body>
    <x-header />

    <main id="home">
        @yield('content')
    </main>

    <x-footer>
        @yield('footer', '© ' . date('Y') . ' Dualana Web')
    </x-footer>

    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>
</html>
