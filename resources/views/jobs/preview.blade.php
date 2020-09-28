@extends('layouts.app')
@section('content')

<style>
    .btn {
        opacity: 50%;
        pointer-events: none;
    }
</style>

@include('jobs._steps-header', ['step' => 2])
<x-job-details :job="$job" />
<div class="container">
    <x-button href="{{route('jobs.edit', $job->id)}}" class="" size="sm"> make changes</x-button>
<x-button href="{{route('checkout', $job->id)}}" class="" > continue on</x-button>
</div>
@endsection