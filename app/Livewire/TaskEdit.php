<?php

namespace App\Livewire;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskEdit extends Component
{
    public $task;
    public $name;
    public $priority;
    public $due_date;
    public $description;

    protected $listeners = ['editTask'];

    public function editTask(int $id): void
    {
        $task = Task::findOrFail($id);
        $this->task = $task;
        $this->name = $task->name;
        $this->priority = $task->priority;
        $this->due_date = $task->due_date;
        $this->description = $task->description;
    }

    public function updateTask()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'priority' => 'required|string|max:255',
            'due_date' => 'nullable|date',
            'description' => 'nullable|string',
        ]);

        $this->task->update([
            'name' => $this->name,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Task updated successfully.');

        $this->dispatch('taskUpdated');
    }

    public function render()
    {
        return view('livewire.task-edit');
    }
}
