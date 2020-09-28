@extends('layouts.app')
@section('content')
<div class="bg-pattern">
    <div class="bg-white border-b">
        <div class="container text-center my-12">
            <div class="text-4xl font-medium">Reach the largest remote community on the web</div>

            <div class="space-y-3 mt-12">
                <ul class="flex space-x-2 justify-between">
                    <li class="text-red-600 text-xl font-medium">Step 1</li>
                    <li class="text-red-600 text-xl font-medium">Step 2</li>
                    <li class="text-red-600 text-xl font-medium">Step 3</li>
                </ul>
                <div class="h-1 bg-gray-200 rounded-md">
                <div class="w-1/3 h-1 bg-red-600"></div>
                </div>
                <ul class="flex space-x-2 justify-between">
                    <li class="text-2xl font-medium">Post a job</li>
                    <li class="text-2xl font-medium">Preview your ad</li>
                    <li class="text-2xl font-medium">Purchase</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container px-8 py-6 border bg-white my-6 shadow-sm">
        @if ($errors->any())
        <div class="rounded-sm px-6 py-4 bg-red-100 my-3 font-medium">
            <ul class="text-red-600 space-y-3">
                @foreach ($errors->all() as $error)
                <li class="list-disc"> {{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{$action}}" method="POST" class="leading-relaxed" enctype="multipart/form-data">
            @csrf
            @method($method)

            <div class="space-y-8">
            <div class="text-red-600 text-2xl font-medium">First, tell us about the position</div>
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="job[title]">Job title </label>
                    <input type="text" name="job[title]" class="form-input" value="{{old('job.title') ?? $job->title}}">
                    <span class="form-text">Example: “Senior Designer”.Titles must describe one position.</span>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex flex-col space-y-2">
                        <label class="form-label" for="company[location]">Company HQ</label>
                        <input type="text" name="company[location]" class="form-input" value="{{old('job.company.location') ?? $job->company->location}}">
                        <span class="form-text">Example: “Chicago, IL”,“Stockholm, Sweden”</span>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label class="form-label" for="job[region]">Regional restrications</label>
                        <select name="job[region]" class="h-12">
                            <option value="Anywhere (100% Remote) Only">Anywhere (100% Remote) Only</option>
                            <option value="USA-only">USA Only</option>
                            <option value="Asia-only">Asia Only</option>
                        </select>
                    </div>
                </div>
    
                <div class="flex flex-col space-y-2">
                    <label for="instructions" class="form-label">How to apply</label>
                    <input type="text" name="job[instructions]" class="form-input" value="{{old('job.instructions') ?? $job->instructions}}">
                    <span class="form-text">Link to Application page or Email address</span>
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="description">Job description</label>
                    <textarea rows="3" name="job[description]" class="form-input bg-white">{{old('job.description') ?? $job->description}}</textarea>
                </div>
            </div>
            <div class="mt-16 mb-6 text-gray-800">
                <div class="text-red-600 font-medium text-2xl">
                    Tell Us More About Your Company
                </div>
                <div class="">
                    <span class="font-medium">Posted before?</span> Just enter your <span class="font-medium">email</span>, all other info will be pulled in from your last position!
                </div>
            </div>
            <div class="space-y-8">
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="company[name]">Comapny name</label>
                    <input type="text" name="company[name]" class="form-input" value="{{old('company.name') ?? $job->company->name}}"></input>
                    <span class="form-text">Enter your company or organization’s name.</span>
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="company[statement]">Comapny statement</label>
                    <input type="text" name="company[statement]" class="form-input" value="{{old('company.statement') ?? $job->company->statement}}"></input>
                    <span class="form-text">Enter your company or organization’s mission statement. This will be displayed on your company’s profile.</span>
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="company[logo]">Comapny logo</label>
                    <input type="file" name="company[logo]" value=""></input>
                    <span class="form-text">t’s highly recommended to use your Twitter or Facebook avatar.
                        Optional — Your company logo will appear at the top of your listing.</span>
                </div>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex flex-col space-y-2">
                        <label class="form-label" for="company[website]">Comapny website</label>
                        <input type="url" name="company[website]" class="form-input" value="{{old('company.website') ?? $job->company->website}}"></input>
                        <span class="form-text">Example: https://mybusiness.com/</span>
                    </div>
                    <div class="flex flex-col space-y-2">
                        <label class="form-label" for="company[email]">email</label>
                        <input type="email" name="company[email]" class="form-input" value="{{old('company.email') ?? $job->company->email}}"></input>
                        <span class="form-text">We’ll send your receipt and confirmation email here.</span>
                    </div>
                </div>
                <div class="flex flex-col space-y-2">
                    <label class="form-label" for="description">company description</label>
                    <textarea rows="3" name="company[description]" class="form-input bg-white">{{old('company.description') ?? $job->company->description}}</textarea>
                </div>
            </div>
            <div class="opacity-25 pointer-events-none" x-data="costData(299)">
                <div class="flex space-x-3 mt-10 mb-5">
                    <button type="button" class="border border-gray-500 px-3 focus:outline-none py-2" :class="{ 'bg-blue-200': cost.plan === 59 }" @click="select('plan',59)">
                        Good $59 </button>
                    <button type="button" class="border border-gray-500 px-3 focus:outline-none py-2" :class="{ 'bg-blue-200': cost.plan === 99 }" @click="select('plan',99)">
                        Better $99 </button>
                    <button type="button" class="border border-gray-500 px-3 focus:outline-none py-2" :class="{ 'bg-blue-200': cost.plan === 149 }" @click="select('plan',149)">
                        Best $149 </button>
                </div>
                <div class="applicant">
                    <input type="checkbox" name="applicant_filter" @click="select('filter', 199)">
                    <label for="applicant_filter">Yes, filter my applicants for only $199.</label>
                </div>
                <div class="mt-10 text-blue-800 text-lg">Your total is : $<span x-text="total()"></span>
                </div>
            </div>
            <button type="submit" class="border py-2 px-4 text-white bg-red-600"> Next step</button>
        </form>



    </div>
</div>
<script>
    function costData(initial) {
        return {
            cost: {
                initial: initial
            },

            select(key, price) {
                // toggle selection
                this.cost[key] === price ?
                    this.cost[key] = 0 : this.cost[key] = price;
            },

            total() {
                return Object.values(this.cost).reduce((acc, curr) => acc + curr, 0);
            }
        }
    }
</script>
@endsection