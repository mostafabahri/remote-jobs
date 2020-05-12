<nav class="hidden lg:flex justify-between px-4 lg:px-32 mt-5">
    <div class="logo text-xl font-bold tracking-wider">WWR</div>
    <div>
        <ul class="flex space-x-3 items-center text-gray-800">

            @foreach ($links() as $link)
            <li><a href="#">{{$link}}</a></li>
            @endforeach
            <li></li>
            <x-button size="sm">Post a job</x-button>
        </ul>
    </div>
</nav>