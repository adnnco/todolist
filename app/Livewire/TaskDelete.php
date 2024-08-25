<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskDelete extends Component
{
    public $taskId;

    protected $listeners = ['openDeleteModal'];

    public function openDeleteModal(int $id)
    {
        $this->taskId = $id;
    }

    public function deleteTask()
    {
        $task = Task::findOrFail($this->taskId);
        $task->delete();

        session()->flash('message', 'Task deleted successfully.');
        $this->dispatch('taskDeleted', $this->taskId);
    }

    public function render()
    {
        return view('livewire.task-delete');
    }
}
