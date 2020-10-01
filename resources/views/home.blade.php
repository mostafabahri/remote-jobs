@extends('layouts.app')
@section('content')

@if (session('message'))
<div class="border p-5 mt-20 text-blue-600">{{session('message')}}</div>
@endif
<livewire:search-jobs></livewire:search-jobs>
<x-footer />
@endsection