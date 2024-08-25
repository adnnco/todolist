<?php

namespace App\Livewire;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Livewire\Component;
use Livewire\WithPagination;

class InboxTasks extends Component
{
    use WithPagination;

    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks', 'taskCompleted' => 'refreshTasks'];

    public function refreshTasks(){}

    public function render(TaskRepository $taskRepository)
    {
        return view('livewire.inbox-tasks', [
            'tasks' => $taskRepository->getInboxWithPaginate(),
        ]);
    }
}
