@extends('layouts.app')
@section('content')
<x-navbar />
<div class="mt-32">
    <x-job-details :job="$job" />
</div>

<x-footer />
@endsection