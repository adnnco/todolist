<?php

namespace App\Livewire;

use App\Models\Label;
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
    public $label_id;
    public $labels;

    protected $listeners = ['editTask'];

    public function editTask(int $id): void
    {
        $task = Task::findOrFail($id);
        $this->task = $task;
        $this->name = $task->name;
        $this->priority = $task->priority;
        $this->due_date = $task->due_date;
        $this->description = $task->description;
        $this->label_id = $task->label_id;
    }

    public function mount(): void
    {
        $this->labels = Label::all();
    }

    public function updateTask()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date|after_or_equal:today',
            'priority' => 'nullable|string|max:2',
            'label_id' => 'nullable|integer',
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
