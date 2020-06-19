@props([
'title' => "WE WORK REMOTELY",
'description' => '',
'cta' => "Post a job for FREE!",
])
<div x-data="{searching: false}">
    <x-navbar />
    <header class="site-header text-center border-b relative">
        <div class="max-w-4xl mx-auto space-y-8 my-5 py-10 px-5">
            <h1 class="text-4xl lg:text-5xl font-bold">{{$title}}</h1>
            <h3 class="text-lg lg:text-xl text-gray-600">{{$description }}</h3>
            <x-button>{{$cta}}</x-button>
        </div>
        <div class="bg-gray-100 shadow-md absolute w-full absoulte" style="top: 0" x-show.transition="searching"
            @click.away="searching = false">
            <div class="max-w-screen-lg mx-auto p-2 text-gray-800 flex">
                <input type="text" wire:model.debounce.200ms="search" class="bg-gray-100 outline-none w-full "
                    placeholder="Search for react, javascript, time zone...">
                <img src="/loading.svg" class="w-5" wire:loading />
            </div>
        </div>
    </header>
</div>