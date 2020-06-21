<nav class="hidden lg:flex justify-between px-4 max-w-screen-xl mx-auto mt-5 mb-2">
    <div class="logo text-xl font-bold tracking-wider">WWR</div>
    <div>
        <ul class="flex space-x-3 items-center text-gray-800">

            @foreach ($links() as $link)
            <li><a href="#"> {{$link}}</a></li>
            @endforeach
            <li class="cursor-pointer -mb-1">
                <ion-icon name="search" class="text-xl"></ion-icon>
            </li>
            <x-button size="sm">Post a job</x-button>
        </ul>
    </div>
</nav>
<div class=" bg-gray-200 shadow">
    <div class="max-w-screen-lg mx-auto p-2 text-gray-800 flex">
        <input type="text" wire:model.debounce.200ms="search" class="bg-gray-200 outline-none w-full "
            placeholder="Search for react, javascript, time zone...">
        <img src="/loading.svg" class="w-5" wire:loading />
    </div>
</div>