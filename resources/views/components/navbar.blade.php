<div class="wrapper fixed top-0 z-30 inset-x-0 bg-white shadow-sm" x-data="searchForm()">
    <nav class="hidden lg:flex justify-between px-4 max-w-screen-xl mx-auto py-5">
        <div class="logo text-xl font-bold tracking-wider"><a href="/">WWR</a></div>
        <div>
            <ul class="flex space-x-4 items-center text-gray-800">

                @foreach ($links() as $link)
                <li><a href="#"> {{$link}}</a></li>
                @endforeach
                <li class="cursor-pointer" @click="open()">
                      <x-heroicon-s-search class="w-6" />
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