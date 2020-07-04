{{-- check if any records exists --}}
@if (App\Job::first())
<span class="text-lg font-normal text-gray-700">
    Latest post {{ App\Job::latest()->first('created_at')->created_at->diffForHumans() }}
</span>
@endif