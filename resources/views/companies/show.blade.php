@extends('layouts.app')
@section('content')
<x-navbar />

<div class="container px-6 mt-32 mb-20">

    <a href="/" class="inline-flex items-center mb-4 space-x-2 font-bold text-red-600">
        <x-heroicon-s-arrow-circle-left class="w-5" />
        <span>Back to all jobs</span>
    </a>

    <div class="bg-gray-100 px-10 py-12 rounded-sm shadow-md">
        <x-company-details :company="$company" :jobsCount="$jobs->count()" />
    </div>

    <section class="mt-20 space-y-4">
        <div class="mr-4 text-lg font-bold">All {{$company->name}} jobs
            @if ($jobs->isNotEmpty())
            <span class="text-lg font-normal text-gray-700">
                Latest post {{ $jobs->first()->created_at->diffForHumans()}}
            </span>
            @endif
        </div>

        <x-job-list :jobs="$jobs" />
    </section>
</div>

<x-footer />
@endsection