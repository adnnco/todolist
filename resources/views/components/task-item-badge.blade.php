@props(['text', 'svg'])

@if ($text)
    <div class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
        <svg class="w-2.5 h-2.5 me-1.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="{{ $svg }}"/>
        </svg>
        <span>{{ $text }}</span>
    </div>
@endif
