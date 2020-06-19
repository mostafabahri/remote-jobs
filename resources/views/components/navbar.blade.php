<nav class="hidden lg:flex justify-between px-4 max-w-screen-xl mx-auto mt-5 mb-2">
    <div class="logo text-xl font-bold tracking-wider">WWR</div>
    <div>
        <ul class="flex space-x-3 items-center text-gray-800">

            @foreach ($links() as $link)
            <li><a href="#"> {{$link}}</a></li>
            @endforeach
            <li class="cursor-pointer -mb-1" @click="searching =true">
                <ion-icon name="search" class="text-xl"></ion-icon>
            </li>
            <x-button size="sm">Post a job</x-button>
        </ul>
    </div>
</nav>