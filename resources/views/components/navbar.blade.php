<div class="wrapper fixed top-0 z-30 inset-x-0 bg-white shadow-sm" x-data="searchForm()">
    <nav class="hidden lg:flex justify-between px-4 max-w-screen-xl mx-auto py-5">
        <div class="logo text-xl font-bold tracking-wider"><a href="/">WWR</a></div>
        <div>
            <ul class="flex space-x-4 items-center text-gray-800">

                @foreach ($links() as $link)
                <li><a href="#"> {{$link}}</a></li>
                @endforeach
                <li class="cursor-pointer" @click="open()">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" height="24" width="24" >
    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
    </svg>
                </li>

                <x-button size="sm" href="{{route('jobs.create')}}">Post a job</x-button>
            </ul>
        </div>
    </nav>
    <div class="bg-gray-100 shadow-md w-full absoulte bottom-0" x-show.transition="searching" @click.away="close()">
        <div class="container p-2 text-gray-800 flex">
            <form action="/" method="get" class="flex-grow">
                <input type="text" name="search" wire:model.debounce.400ms="search"
                    class="bg-gray-100 outline-none w-full" placeholder="Search for react, javascript, time zone...">
            </form>
            <img src="/loading.svg" class="w-5" wire:loading />
        </div>
    </div>
</div>
<script>
    function searchForm() {
        return {
           searching: {{request()->has('search') ? 'true' : 'false'}},
           open() {this.searching = true},
           close() {this.searching = false}
        }
    }
</script>