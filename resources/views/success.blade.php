@extends('layouts.app')
@section('content')

<x-navbar></x-navbar>
<div class="container px-4 mt-32 mb-20 space-y-3">
    <h1 class="text-3xl font-medium">
        Your ad is live now!

    </h1>
    <x-button href="{{route('jobs.show', $job->id)}}"> take me to my job! </x-button>
    <p>We also emailed your receipt to email@test.com</p>
    <p class="text-blue-800 italic text-sm">Thanks for your purchase!</p>
</div>
<x-footer />
@endsection