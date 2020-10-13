@extends('layouts.app')
@section('content')
<x-navbar />
<div class="mt-32 mb-16 container px-3 py-6">

    <div class="flex justify-between mb-4">
        <a href="/" class="inline-flex items-center space-x-2 font-bold text-red-600">
            <x-heroicon-s-arrow-circle-left class="w-5" />
            <span>Back to all jobs</span>
        </a>

        <a href="/" class="flex items-center justify-end space-x-2 font-bold text-red-600">
            <span>See more programming jobs</span>
            <x-heroicon-s-arrow-circle-right class="w-5" />
        </a>
    </div>
    <x-job-details :job="$job" />
</div>
</div>

<x-footer />
@endsection