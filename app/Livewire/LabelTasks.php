<?php

namespace App\Livewire;

use App\Repositories\TaskRepository;
use Livewire\Component;
use Livewire\WithPagination;

class LabelTasks extends Component
{
    use WithPagination;


    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks', 'taskCompleted' => 'refreshTasks', 'taskCreated' => 'refreshTasks'];

    public function refreshTasks(){}

    public function render(TaskRepository $taskRepository)
    {
        return view('livewire.label-tasks', [
            'tasks' => $taskRepository->getLabelWithPaginate(request()->route('label'), 10),
        ]);
    }
}
