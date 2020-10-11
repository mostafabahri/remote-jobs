@extends('layouts.app')
@section('content')
<x-navbar />

<div class="container px-6 mt-32 mb-20">

    <a href="/" class="inline-flex items-center space-x-2 font-bold text-red-600">
        <svg class="w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <title>left arrow icon</title>
            <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z"
                clip-rule="evenodd"></path>
        </svg>
        <span>Back to all jobs</span>
    </a>

    <section class="px-10 py-12 mt-4 bg-gray-100 rounded-sm shadow-md">
        <div class="flex justify-between">
            <div class="flex items-center space-x-6">
                <img src="{{$company->logo}}" alt="{{$company->name}} logo" class="object-cover w-24 h-24 rounded-full">
                <div class="space-y-2">
                    <h1 class="text-2xl font-semibold">{{$company->name}}</h1>
                    <h3 class="inline-flex text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="mr-1" width="20" height="20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                clip-rule="evenodd" />
                        </svg> <span class="font-medium">{{$company->location}}</span></h3>
                    <div class="text-sm tracking-tight text-gray-700 uppercase">Jobs posted : {{$jobs->count()}}</div>
                </div>
            </div>
            <div class="space-y-4 text-right text-gray-800">
                <div class="">
                    <div class="text-sm font-thin leading-7">Share this company: </div>

                    <div class="inline-flex space-x-3">

                        {{-- Telegram --}}
                        <svg role="img" class="w-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24">
                            <title>Telegram icon</title>
                            <path
                                d="M23.91 3.79L20.3 20.84c-.25 1.21-.98 1.5-2 .94l-5.5-4.07-2.66 2.57c-.3.3-.55.56-1.1.56-.72 0-.6-.27-.84-.95L6.3 13.7l-5.45-1.7c-1.18-.35-1.19-1.16.26-1.75l21.26-8.2c.97-.43 1.9.24 1.53 1.73z" />
                        </svg>
                        {{-- Gmail --}}
                        <svg role="img" fill="currentColor" viewBox="0 0 24 24" class="w-5"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Gmail icon</title>
                            <path
                                d="M24 4.5v15c0 .85-.65 1.5-1.5 1.5H21V7.387l-9 6.463-9-6.463V21H1.5C.649 21 0 20.35 0 19.5v-15c0-.425.162-.8.431-1.068C.7 3.16 1.076 3 1.5 3H2l10 7.25L22 3h.5c.425 0 .8.162 1.069.432.27.268.431.643.431 1.068z" />
                        </svg>
                        {{-- Twitter --}}
                        <svg role="img" fill="currentColor" class="w-5" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <title>Twitter icon</title>
                            <path
                                d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.951.555-2.005.959-3.127 1.184-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124C7.691 8.094 4.066 6.13 1.64 3.161c-.427.722-.666 1.561-.666 2.475 0 1.71.87 3.213 2.188 4.096-.807-.026-1.566-.248-2.228-.616v.061c0 2.385 1.693 4.374 3.946 4.827-.413.111-.849.171-1.296.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.39 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63.961-.689 1.8-1.56 2.46-2.548l-.047-.02z" />
                        </svg>

                    </div>
                </div>

                <a href="{{$company->website}}" class="inline-flex items-center space-x-1 font-medium text-red-600">
                    <span>
                        View website
                    </span>
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z"
                                clip-rule="evenodd" />
                        </svg>
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

    <section class="mt-20 space-y-4">
        <div class="mr-4 text-lg font-bold">All {{$company->name}} jobs
            @if ($jobs->isNotEmpty())
            <span class="text-lg font-normal text-gray-700">
                Latest post {{ $jobs->first()->created_at->diffForHumans()}}
            </span>
            @endif
        </div>

        <x-job-list :jobs="$jobs" />
    </section>
</div>

<x-footer />
@endsection