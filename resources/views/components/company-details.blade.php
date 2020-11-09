<section>
    <div class="flex justify-between">
        <div class="flex items-center space-x-6">
            <img src="{{$company->logoUrl()}}" alt="{{$company->name}} logo" class="object-contain w-24 h-24 rounded-full">
            <div class="space-y-2">
                <h1 class="text-2xl font-semibold">{{$company->name}}</h1>
                <h3 class="inline-flex items-center text-gray-800">
                    <x-heroicon-s-location-marker class="w-5 mr-1" />
                    <span class="font-medium">{{$company->location}}</span>
                </h3>
                <div class="text-sm tracking-tight text-gray-700 uppercase">Jobs posted: {{$jobsCount}}</div>
            </div>
        </div>
        <div class="space-y-4 text-right text-gray-800 preview">
            <div class="">
                <div class="text-sm font-thin leading-7">Share this company: </div>

                <div class="inline-flex space-x-3">
                    <x-simpleicon-telegram class="w-5" />
                    <x-simpleicon-gmail class="w-5" />
                    <x-simpleicon-twitter class="w-5" />
                </div>
            </div>

            <a href="{{$company->website}}" class="inline-flex items-center space-x-1 font-medium text-red-600">
                <span>
                    View website
                </span>
                <span>
                    <x-heroicon-s-arrow-circle-right class="w-5" />
                </span>
            </a>
        </div>
    </div>
    <div class="mt-6 mb-10 border-b"> </div>
    <div class="max-w-full leading-loose prose-sm prose">
        <h2> {{$company->statement}}
        </h2>
        <p>
            {{$company->description}}
        </p>
    </div>
</section>