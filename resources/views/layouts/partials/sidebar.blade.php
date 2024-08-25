<aside class="fixed top-0 left-0 z-40 w-64 h-screen pt-14 transition-transform -translate-x-full bg-white shadow md:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidenav" id="drawer-navigation">
    <div class="overflow-y-auto py-5 px-3 h-full bg-white dark:bg-gray-800">

        <ul class="space-y-2">
            @foreach(config('sidebar.menuItems') as $item)
                <li>
                    @if(isset($item['action']))
                        <button type="button" id="{{ $item['name'] }}" class="flex items-center p-2 w-full text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group" {!! $item['action']  !!}>
                            {!! $item['icon'] !!}
                            <span class="ml-2">{{ $item['label'] }}</span>
                        </button>
                    @else
                        <a href="{{ route($item['route']) }}" class="flex items-center p-2 w-full text-sm font-medium text-gray-900 rounded-lg dark:text-white {{ request()->routeIs($item['route']) ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                            {!! $item['icon'] !!}
                            <span class="ml-2">{{ $item['label'] }}</span>
                        </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</aside>

<livewire:task-create />
