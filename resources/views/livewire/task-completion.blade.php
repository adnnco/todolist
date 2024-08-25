<div class="-mt-1">
    <input type="checkbox" class="w-5 h-5 text-gray-600 bg-gray-100 border-gray-300 rounded focus:ring-gray-500 dark:focus:gray-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" @if($task->completed) checked @endif wire:click="toggleCompletion">
</div>
