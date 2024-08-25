@props(['task'])

<button data-dropdown-toggle="dropdown{{ $task->id }}" type="button" class="ml-auto h-full p-1 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
    <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-width="4" d="M6 12h.01m6 0h.01m5.99 0h.01"/>
    </svg>
    <span class="sr-only">Settings</span>
</button>
<div id="dropdown{{ $task->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Add Sub Task') }}</a></li>
        <li><button class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" wire:click="$dispatch('editTask', { id: {{ $task->id }} })" x-on:click.prevent="$dispatch('open-modal', 'task-edit-modal')">{{ __('Edit') }}</button></li>
        <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('Delete') }}</a></li>
    </ul>
</div>
