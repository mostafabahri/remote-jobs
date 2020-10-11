<div class="container">
    <main class="py-6 px-3 flex justify-between sm:space-x-4">
        <div class="w-full sm:w-3/5">
            
            
    <a href="/" class="inline-flex items-center space-x-2 font-bold text-red-600">
        <svg class="w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>left arrow icon</title>
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                clip-rule="evenodd"></path>
        </svg>
        <span>Back to all jobs</span>
    </a>
            <h4 class="uppercase text-gray-700 mt-4 text-sm">Posted
                    {{$job->created_at->format('M d')}}
                    </h4>
                    <h2 class="font-medium text-3xl my-4 capitalize">{{$job->title}}</h2>

                    <div class="prose lg:prose-lg text-gray-800 my-4">
                        {{$job->description}}
                    </div>
                    <div class="my-10">
                        <x-button href="{{ $job->instructions }}" class="btn"> Apply for this position</x-button>
                    </div>
        </div>
        <div class="hidden sm:block">
                
    <a href="/" class="inline-flex items-center mb-4 space-x-2 font-bold text-red-600">
        <svg class="w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>left arrow icon</title>
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                clip-rule="evenodd"></path>
        </svg>
        <span>See more programming jobs</span>
    </a>
                
                
                <div
                    class="px-6 py-8 bg-gray-200 shadow-sm flex flex-col items-center space-y-3">

                    <a href="{{$job->company->route}}">
                        <img src="{{$job->company->logo}}" alt="logo" class="w-20 h-20 rounded-full">
                    </a>

                    <a href="{{$job->company->route}}">
                        <h4 class="text-lg font-bold">{{$job->company->name}}</h4>
                    </a>
                    <p class="uppercase text-sm text-gray-700"> jobs posted: {{$job->company->jobs_count}}</p>
                    <x-button href="{{$job->instructions}}" class="btn" size="sm"> Apply for this position
                    </x-button>
        </div>

</div>
</main>
</div>