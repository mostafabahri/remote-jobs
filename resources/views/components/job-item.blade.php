<a href="{{route('jobs.show', $job->id)}}">
    <article class="flex py-6 items-center border border-gray-400 hover:bg-gray-100 px-8 lg:px-16">
        @if($companyLogo())
        <img src="{{$companyLogo()}}" alt="logo"
            class="hidden lg:block w-16 h-16 border border-gray-900 rounded-full transform -translate-x-8 bg-gray-100 lg:-ml-16">
        @endif

        <div class="space-y-2 flex-grow">
            <h4 class="text-gray-800">{{$job->company->name}}</h4>
            <h2 class="font-medium text-lg capitalize">{{$job->title}}</h2>
            <div class="text-gray-800">{{$job->region}}</div>
        </div>
        <div class="font-bold">
            {{$date}}
        </div>
    </article>
</a>