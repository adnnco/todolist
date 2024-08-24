@props(['task'])

<li class="ps-3 relative items-center" data-accordion="collapse">

    @if($task->children->isNotEmpty())
        <button type="button" id="accordion-collapse-btn-{{ $task->id }}" class="absolute top-2.5 bottom-auto -left-6 flex items-center p-1 text-sm font-medium text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700" data-accordion-target="#accordion-collapse-body-{{ $task->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $task->id }}">
            <svg class="w-4 h-4 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
            </svg>
            <span class="sr-only">Accordion</span>
        </button>
    @endif

    <div class="items-center py-3 border-b border-dashed">
        <div class="flex items-stretch">
            <input type="checkbox" value="" class="w-5 h-5 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 dark:focus:gray-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($task->completed) checked @endif wire:click="toggleCompletion({{ $task->id }},{{($task->completed) ?0: 1}})">

            <div class="mx-2 space-y-2">
                <div class="flex text-sm font-semibold text-gray-900 dark:text-gray-300">
                    {{ $task->name }}
                </div>

                @if($task->description)
                    <p class="text-xs font-medium text-gray-900 dark:text-gray-300">{{ $task->description }}</p>
                @endif

                <div class="flex items-center">
                    <x-task-item-badge svg="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" text="{{ $task->due_date_formated }}"/>
                    <x-task-item-badge svg="M13.09 3.294c1.924.95 3.422 1.69 5.472.692a1 1 0 0 1 1.438.9v9.54a1 1 0 0 1-.562.9c-2.981 1.45-5.382.24-7.25-.701a38.739 38.739 0 0 0-.622-.31c-1.033-.497-1.887-.812-2.756-.77-.76.036-1.672.357-2.81 1.396V21a1 1 0 1 1-2 0V4.971a1 1 0 0 1 .297-.71c1.522-1.506 2.967-2.185 4.417-2.255 1.407-.068 2.653.453 3.72.967.225.108.443.216.655.32Z" text="{{ $task->priority }}"/>
                    <x-task-item-badge svg="M4 6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h11.613a2 2 0 0 0 1.346-.52l4.4-4a2 2 0 0 0 0-2.96l-4.4-4A2 2 0 0 0 15.613 6H4Z" text="{{ $task->label->name ?? '' }}"/>
                </div>
            </div>

            <x-task-item-dropdown :task="$task" />
        </div>


    </div>

    @if($task->children->isNotEmpty())
        <div id="accordion-collapse-body-{{ $task->id }}" class="hidden" aria-labelledby="accordion-collapse-btn-{{ $task->id }}">
            <ul class="ms-6 mt-3" data-accordion="collapse">
                @foreach($task->children as $child)
                    <x-task-item :task="$child"/>
                @endforeach
            </ul>
        </div>
    @endif


</li>
