<?php

namespace App\Livewire;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TodayTasks extends Component
{
    use WithPagination;

    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks', 'taskCompleted' => 'refreshTasks', 'taskCreated' => 'refreshTasks'];

    public function refreshTasks(){}

    public function render(TaskRepository $taskRepository)
    {
        return view('livewire.today-tasks', [
            'tasks' => $taskRepository->getTodayWithPaginate(),
        ]);
    }
}
