<?php

namespace App\Livewire;

use App\Repositories\TaskRepository;
use Carbon\Carbon;
use Livewire\Component;

class TaskList extends Component
{

    public $overdueTasks = [];
    public $upcomingTasks = [];
    public $todayTasks = [];

    protected $taskRepository;

    public function __construct()
    {
        $this->taskRepository = new TaskRepository;
    }

    public function mount()
    {
        $tasks = $this->taskRepository->all();

        foreach ($tasks as $task) {
            if (Carbon::parse($task->due_date)->isToday()) {
                $this->todayTasks[] = $task;
            } elseif (Carbon::parse($task->due_date)->isPast()) {
                $this->overdueTasks[] = $task;
            } else {
                $this->upcomingTasks[] = $task;
            }
        }
    }

    public function render()
    {
        return view('livewire.task-list');
    }
}
