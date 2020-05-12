<nav class="hidden lg:flex justify-between">
    <div class="logo text-xl font-bold tracking-wider">WWR</div>
    <div>
        <ul class="flex space-x-3 items-center text-gray-800">

            @foreach ($links() as $link)
            <li><a href="#">{{$link}}</a></li>
            @endforeach
            <li></li>
            <button href="#" class="bg-red-600 text-white px-5 py-2 hover:shadow-lg font-medium text-sm">Post a job
            </button>
        </ul>
    </div>
</nav>