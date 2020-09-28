@extends('layouts.app')
@section('content')

<style>
    .btn {
        opacity: 50%;
        pointer-events: none;
    }
</style>

<x-job-details :job="$job" />
<div class="container">
    <x-button href="{{route('jobs.edit', $job->id)}}" class="" size="sm"> make changes</x-button>
</div>
@endsection