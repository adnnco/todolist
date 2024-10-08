<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
    <div class="mb-4">
        <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
            @forelse($tasks as $task)
                <x-task-item :task="$task" :wire:key="$task->id" />
            @empty
                <li>No tasks for label.</li>
            @endforelse
        </ul>
    </div>

    {{ $tasks->links() }}

    <livewire:task-edit />
    <livewire:task-delete />
</div>
