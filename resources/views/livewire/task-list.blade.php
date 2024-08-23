<div>
    <h2 class="text-xl font-bold mb-4">Overdue Tasks</h2>
    <ul>
        @forelse($overdueTasks as $task)
            <li class="mb-2">
                <span class="font-semibold">{{ $task->name }}</span> - Due: {{ $task->due_date }}
            </li>
        @empty
            <li>No overdue tasks.</li>
        @endforelse
    </ul>

    <h2 class="text-xl font-bold mt-6 mb-4">Today's Tasks</h2>
    <ul>
        @forelse($todayTasks as $task)
            <li class="mb-2">
                <span class="font-semibold">{{ $task->name }}</span> - Due: {{ $task->due_date }}
            </li>
        @empty
            <li>No tasks for today.</li>
        @endforelse
    </ul>

    <h2 class="text-xl font-bold mt-6 mb-4">Upcoming Tasks</h2>
    <ul>
        @forelse($upcomingTasks as $task)
            <li class="mb-2">
                <span class="font-semibold">{{ $task->name }}</span> - Due: {{ $task->due_date }}
            </li>
        @empty
            <li>No upcoming tasks.</li>
        @endforelse
    </ul>
</div>
