<nav class="xl:w-3/12  medium:w-4/12 hidden medium:block border-r border-gray-100 px-8 py-2 relative">
    <div class="sticky top-0 mt-6">
        <ul class="w-full ">
            @foreach ($tabs as $tab)
                <li id="{{ $tab['route'] }}"
                    class="mb-3 hover:text-primary text-dark flex items-center py-2 px-4 hover:bg-lightblue rounded-full mr-auto">
                    <a class="flex text-lg font-semibold w-full {{ request()->routeIs($tab['route']) ? 'text-primary' : '' }}"
                        href="{{ route($tab['route']) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 w-6" viewBox="{{ $tab['viewbox'] }}">
                            <path class="path {{ request()->routeIs($tab['route']) ? 'fill-current' : '' }}"
                                d="{{ $tab['d'] }}" />
                        </svg>
                        {{ $tab['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-white bg-primary rounded-full font-semibold w-full p-3 focus:outline-none hover:bg-darkblue">Logout</button>
        </form>
    </div>
</nav>
