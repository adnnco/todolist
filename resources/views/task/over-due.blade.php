<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Over Due') }}
        </h2>
    </x-slot>

    <livewire:overdue-tasks />
</x-app-layout>
