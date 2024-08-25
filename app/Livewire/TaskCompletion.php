<?php

namespace App\Livewire;

use Livewire\Component;

class TaskCompletion extends Component
{
    public $task;

    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks','taskCompleted' => 'refreshTasks'];

    public function refreshTasks() {}

    public function toggleCompletion(): void
    {
        $this->task->completed = !$this->task->completed;
        $this->task->save();

        $this->dispatch('taskCompleted');
    }

    public function render()
    {
        return view('livewire.task-completion');
    }
}
