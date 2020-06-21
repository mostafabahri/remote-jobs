{{-- Single root required for Livewire to work --}}
<div>
    <x-navbar />
    <x-header>
        <x-slot name="description">
            We Work Remotely is the <span class="font-medium text-gray-900">largest remote work community in the
                world</span>. With over 2.5M monthly visitors, WWR is the #1 destination to find and list incredible
            remote jobs.
        </x-slot>
    </x-header>

    <main>
        <div class="my-12 max-w-screen-lg mx-auto space-y-4" wire:loading.class="opacity-50">
            <div class="text-2xl font-medium ml-4">Programming Jobs <span class="text-lg font-normal text-gray-700">
                    Latest
                    post {{App\Job::latest()->first('created_at')->created_at->diffForHumans()}}</span></div>
            <x-job-list :jobs="$this->jobs" />

            <div class="flex justify-center">
                {{$this->jobs->links()}}
            </div>

        </div>
    </main>
</div>