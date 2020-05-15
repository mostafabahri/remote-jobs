<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>We Work Remotely</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <x-navbar />
    <x-header>
        <x-slot name="description">
            We Work Remotely is the <span class="font-medium text-gray-900">largest remote work community in the
                world</span>. With over 2.5M monthly visitors, WWR is the #1 destination to find and list incredible
            remote jobs.
        </x-slot>
    </x-header>

    <div class="mt-10 max-w-screen-lg mx-auto space-y-4">
        <div class="text-2xl font-medium ml-4">Programming Jobs <span class="text-lg font-normal text-gray-700"> Latest
                post 25 minutes ago</span></div>
        <x-job-list :jobs="$jobs" />
    </div>
</body>

</html>