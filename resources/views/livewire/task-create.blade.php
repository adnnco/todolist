@php use App\Enums\Priority; @endphp
<x-modal name="task-create-modal" focusable>
    @if (session()->has('message'))
        <x-alert-message>
            {{ session('message') }}
        </x-alert-message>
    @endif

    <form class="p-4 md:p-5" wire:submit.prevent="createTask">
        @csrf

        @if($parent_id)
            <input type="hidden" name="parent_id" wire:model="parent_id">

            <div class="relative z-0 w-full mb-5 group">
                <div class="p-4 mb-5 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
                    <span class="font-bold">{{ __('Parent Task:') }}</span> {{ $parent_name }}
                </div>
            </div>
        @endif

        <div class="relative z-0 w-full mb-5 group">
            <x-task-text-input id="name" name="name" type="text" class="mt-1 block w-full" wire:model="name" required autofocus autocomplete="name"/>
            <x-task-input-label for="name" :value="__('Task Name')"/>
            <x-task-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div class="relative z-0 w-full mb-5 group">
            <x-task-textarea-input id="description" name="description" class="mt-1 block w-full" wire:model="description" required/>
            <x-task-input-label for="description" :value="__('Description')"/>
            <x-task-input-error class="mt-2" :messages="$errors->get('description')"/>
        </div>

        <div class="flex z-0 mb-5 group gap-2">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                    </svg>
                </div>
                <input name="due_date" wire:model="due_date" type="date" min="{{ date('Y-m-d') }}" class=" bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-md focus:ring-blue-500 focus:border-blue-500 inline-block w-[90px] ps-6 pt-1.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('Due date') }}">
            </div>

            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                    <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         viewBox="0 0 24 24">
                        <path
                            d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z"/>
                    </svg>
                </div>
                <select name="priority" wire:model="priority" id="task_priority" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs rounded-md focus:ring-blue-500 focus:border-blue-500 inline-block w-[110px] ps-6 pt-1.5 p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>{{ __('Priority') }}</option>
                    @foreach(Priority::cases() as $priority)
                        <option value="{{ $priority->value }}">{{ $priority->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-task-input-error class="mt-2" :messages="$errors->get('due_date')"/>
            <x-task-input-error class="mt-2" :messages="$errors->get('priority')"/>
        </div>

        <x-task-button type="submit">{{ __('Update Task') }}</x-task-button>
        <x-task-button x-on:click="show = false" class="!text-gray-900 focus:outline-none bg-white border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">{{ __('Cancel') }}</x-task-button>
    </form>
</x-modal>
