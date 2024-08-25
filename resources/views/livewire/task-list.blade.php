<div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
        <div>
            <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">{{ __('Overdue Tasks') }}</h3>
            <ul class="block w-full space-y-4 text-left text-gray-500 dark:text-gray-400">
                @forelse($overdueTasks as $task)
                    <x-task-item :task="$task" :wire:key="$task->id" />
                @empty
                    <li>No overdue tasks.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
        <div>
            <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">{{ __('Today\'s Tasks') }}</h3>
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @forelse($todayTasks as $task)
                    <x-task-item :task="$task" :wire:key="$task->id" />
                @empty
                    <li>No tasks for today.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
        <div>
            <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">{{ __('Upcoming Tasks') }}</h3>
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @forelse($upcomingTasks as $task)
                    <x-task-item :task="$task" :wire:key="$task->id" />
                @empty
                    <li>No upcoming tasks.</li>
                @endforelse
            </ul>
        </div>
    </div>

    <livewire:task-edit />
    <livewire:task-delete />
</div>

