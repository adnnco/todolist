<x-modal name="task-delete-modal" :show="$errors->taskDelete->isNotEmpty()" focusable>

    @if (session()->has('message'))
        <x-alert-message>
            {{ session('message') }}
        </x-alert-message>
    @endif

    <form class="p-4 md:p-5 text-center" wire:submit.prevent="deleteTask">
        @csrf
        @method('delete')

        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
        <p class="mb-4 text-gray-500 dark:text-gray-300">Are you sure you want to delete this item?</p>

        <x-task-button x-on:click="$dispatch('close')" class="!text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{ __('Cancel') }}</x-task-button>
        <x-task-button x-on:click="setTimeout(() => { show = false }, 2000)" type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __('Delete Task') }}</x-task-button>
    </form>
</x-modal>
