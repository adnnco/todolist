<div>
    <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg mt-6">
        <div>
            <h3 class="font-semibold text-gray-800 dark:text-gray-200 leading-tight mb-4">Overdue Tasks</h3>
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
        <div class="max-w-xl">
            <h2 class="font-bold mb-4">Today's Tasks</h2>
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
        <div class="max-w-xl">
            <h2 class="font-bold mb-4">Upcoming Tasks</h2>
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @forelse($upcomingTasks as $task)
                    <x-task-item :task="$task" :wire:key="$task->id" />
                @empty
                    <li>No upcoming tasks.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
