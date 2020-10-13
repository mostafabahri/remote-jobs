@extends('layouts.app')
@section('content')

<style>
    .preview {
        opacity: 50%;
        pointer-events: none;
    }
</style>

<div class="bg-pattern">
    @include('jobs._steps-header', ['step' => 2])
    <div class="container py-16" x-data="{ selected: 'job' }">

        <div x-show="selected === 'job'" class="px-10 py-12 bg-white rounded-sm shadow-md">
            <x-job-details :job="$job"/>
        </div>

        <div x-show="selected === 'company'" class="px-10 py-12 bg-white rounded-sm shadow-md">
            <x-company-details :company="$job->company" :jobsCount="$job->company->jobs_count"/>
        </div>

        <div class="flex justify-between mt-6">
            <div class="flex gap-4">
                <div>
                    <input type="radio" id="select-job" value="job" x-model="selected">
                    <label for="select-job">Preview Job</label>
                </div>
                <div>
                    <input type="radio" id="select-company" value="company" x-model="selected">
                    <label for="select-company">Preview Company</label>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <x-button href="{{route('checkout', $job->id)}}" class=""> continue on</x-button>
                <div>or</div>
                <a href="{{route('jobs.edit', $job->id)}}" class="inline-flex items-center font-medium text-red-600"
                    size="sm">
                    Make changes
                    <x-heroicon-s-arrow-circle-left class="w-5 ml-1" />
                </a>
            </div>
        </div>
    </div>
</div>
@endsection