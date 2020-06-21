<div class="wrapper fixed top-0 z-30 inset-x-0 bg-white shadow-sm" x-data="{searching: false}">
    <nav class="hidden lg:flex justify-between px-4 max-w-screen-xl mx-auto py-5">
        <div class="logo text-xl font-bold tracking-wider"><a href="/">WWR</a></div>
        <div>
            <ul class="flex space-x-3 items-center text-gray-800">

                @foreach ($links() as $link)
                <li><a href="#"> {{$link}}</a></li>
                @endforeach
                <li class="cursor-pointer -mb-1" @click="searching = true">
                    <ion-icon name="search" class="text-xl"></ion-icon>
                </li>
                <x-button size="sm">Post a job</x-button>
            </ul>
        </div>
    </nav>
    <div class="bg-gray-100 shadow-md w-full absoulte bottom-0" x-show.transition="searching"
        @click.away="searching = false">
        <div class="max-w-screen-lg mx-auto p-2 text-gray-800 flex">
            <input type="text" wire:model.debounce.200ms="search" class="bg-gray-100 outline-none w-full"
                placeholder="Search for react, javascript, time zone...">
            <img src="/loading.svg" class="w-5" wire:loading />
        </div>
    </div>
</div>