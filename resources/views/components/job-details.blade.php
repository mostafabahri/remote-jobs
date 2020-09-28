<div class="container">
    <main class="py-6 px-3 flex justify-between sm:space-x-4">
        <div class="w-full sm:w-3/5">
            <a href="/" class="text-red-600 font-bold">
                <- Back to all jobs </a> <h4 class="uppercase text-gray-700 mt-4 text-sm">Posted
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
            <a href="#" class="text-red-600 font-bold block mb-4">
                <- See more programming jobs </a> <div
                    class="px-6 py-8 bg-gray-200 shadow-sm flex flex-col items-center space-y-3">

                    <img src="{{$job->company->logo}}" alt="logo" class="w-20 h-20 rounded-full">

                    <h4 class="text-lg font-bold">{{$job->company->name}}</h4>
                    <p class="uppercase text-sm text-gray-700"> jobs posted: {{$job->company->jobs_count}}</p>
                    <x-button href="{{$job->instructions}}" class="btn" size="sm"> Apply for this position
                    </x-button>
        </div>

</div>
</main>
</div>