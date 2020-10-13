<section>
    <div class="flex justify-between sm:space-x-4">
        <div class="w-full sm:w-3/5">


            <h4 class="mt-4 text-sm text-gray-700 uppercase">Posted
                {{$job->created_at->format('M d')}}
            </h4>
            <h2 class="my-4 text-3xl font-medium capitalize">{{$job->title}}</h2>

            <div class="my-4 prose text-gray-800 lg:prose-lg">
                {{$job->description}}
            </div>
            <div class="my-10">
                <x-button href="{{ $job->instructions }}" class="preview"> Apply for this position</x-button>
            </div>
        </div>
        <div class="hidden sm:block">


            <div class="px-6 bg-gray-100 shadow-md">

                <div class="flex flex-col items-center py-6 space-y-3">
                    <a href="{{$job->company->route}}">
                        <img src="{{$job->company->logo}}" alt="logo" class="object-contain w-20 h-20 rounded-full">
                    </a>

                    <a href="{{$job->company->route}}">
                        <h4 class="text-lg font-bold">{{$job->company->name}}</h4>
                    </a>
                    <p class="text-sm text-gray-700 uppercase"> jobs posted: {{$job->company->jobs_count}}</p>
                    <x-button href="{{$job->instructions}}" class="preview" size="sm"> Apply for this position
                    </x-button>
                </div>
                <div class="pt-3 pb-6 border-t preview">
                    <a href="{{$job->company->route}}"
                        class="flex items-center justify-center space-x-2 font-bold text-red-600">
                        <span>View all jobs</span>
                        <x-heroicon-s-arrow-circle-right class="w-5" />
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>