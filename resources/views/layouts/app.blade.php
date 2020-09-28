<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>We Work Remotely</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    <livewire:styles />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.3.5/dist/alpine.min.js" defer></script>
    @stack('head')
</head>


<body>
    @yield('content')

    <livewire:scripts />
    @stack('scripts')
</body>

</html>