<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>We Work Remotely</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('styles')
    @stack('head-scripts')
    <livewire:styles>
</head>


<body>
    @yield('content')

    @stack('scripts')
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <livewire:scripts>
</body>

</html>