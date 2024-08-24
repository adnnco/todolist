<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskEdit extends Component
{
    public $task;
    public $name;
    public $priority;
    public $due_date;
    public $description;

    protected $listeners = ['editTask'];

    public function editTask(Task $task): void
    {
        $this->task = $task;
        $this->name = $task->name;
        $this->priority = $task->priority;
        $this->due_date = $task->due_date;
        $this->description = $task->description;
    }

    public function updateTask(): void
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

        $this->emit('taskUpdated');
    }

    public function render()
    {
        return view('livewire.task-edit');
    }
}
