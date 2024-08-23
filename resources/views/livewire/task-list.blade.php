<div>
    <h2 class="text-xl font-bold mb-4">Overdue Tasks</h2>

    <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
        @forelse($overdueTasks as $task)
            <li class="items-center space-x-3">
                <div>
                    <input id="default-radio-1" type="radio" value="" name="default-radio"
                           class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <button type="button">
                        <span>{{ $task->name }}</span>
                    </button>
                </div>
                <div>
                    <div class="flex">
                        @if($task->due_date)
                           <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                               <svg class="w-2.5 h-2.5 me-1.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/></svg>
                                {{ $task->due_date_formated }}
                           </span>
                        @endif
                            @if($task->priority)
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded me-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500 ">
                                    <svg class="w-2.5 h-2.5 me-1.5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z"/></svg>
                                    {{ $task->priority }}
                               </span>
                            @endif
                    </div>
                </div>
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


