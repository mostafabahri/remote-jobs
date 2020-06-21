@props([
'title' => "WE WORK REMOTELY",
'description' => '',
'cta' => "Post a job for FREE!",
])
<x-navbar></x-navbar>
<header class="site-header text-center border-b">
    <div class="max-w-4xl mx-auto space-y-8 my-5 py-10 px-5">
        <h1 class="text-4xl lg:text-5xl font-bold">{{$title}}</h1>
        <h3 class="text-lg lg:text-xl text-gray-600">{{$description }}</h3>
        <x-button>{{$cta}}</x-button>
    </div>
</header>