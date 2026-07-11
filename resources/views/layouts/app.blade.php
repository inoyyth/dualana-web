<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Laravel'))</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f8fafc; color: #0f172a; }
        .wrapper { max-width: 1100px; margin: 0 auto; padding: 2rem 1.5rem 3rem; }
        main { padding: 2rem 0; }
    </style>
</head>
<body>
    <x-header />

    <div class="wrapper">
        <main>
            @yield('content')
        </main>

        <x-footer>
            @yield('footer', '© ' . date('Y') . ' Dualana Web')
        </x-footer>
    </div>
</body>
</html>
