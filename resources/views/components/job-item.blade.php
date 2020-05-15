<article class="flex py-6 items-center bg-yellow-200">
    <img src="{{$job->company->logo}}" alt="logo"
        class="hidden lg:block w-16 h-16 border border-gray-900 rounded-full transform -translate-x-8">
    <div class="space-y-2 flex-grow ">
        <h4 class="text-gray-800">{{$job->company->name}}</h4>
        <h2 class="font-medium text-lg">{{$job->title}}</h2>
        <div class="text-gray-800">{{$job->region}}</div>
    </div>
    <div class="mr-8 lg:mr-16 font-bold">
        {{$job->date}}
    </div>
</article>