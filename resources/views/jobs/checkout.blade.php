@extends('layouts.app')

@section('content')
<div class="bg-pattern">
    @include('jobs._steps-header', ['step' => 3])

    <div class="container px-8 py-6 border bg-white my-6 shadow-sm space-y-5">
        <h1 class="font-3xl">Purchase your ad <span>{{$job->company->name}}</span></h1>


          <p class="font-medium">You will be redirected to Stripe for secure payment.</p>
          <p> Enter <code class="text-gray-800">4242 4242 4242 4242 </code> for card number and any future date and CVC is valid.</p>

        <div class="text-red-600">Total $299</div>
        <livewire:stripe-checkout :clientRef="$job->id"/>
      <x-button href="{{route('jobs.edit', $job->id)}}" class="" size="sm"> make changes</x-button>
    </div>

</div>

@endsection