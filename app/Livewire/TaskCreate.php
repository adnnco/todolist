<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;

class TaskCreate extends Component
{
    public $name;
    public $priority;
    public $due_date;
    public $description;

    protected $rules = [
        'name' => 'required|string|max:255',
        'priority' => 'nullable|string|max:2',
        'due_date' => 'nullable|date|after:today',
        'description' => 'nullable|string',
    ];

    public function createTask()
    {
        $this->validate();

        Task::create([
            'user_id' => 1,
            'name' => $this->name,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Task created successfully.');

        $this->reset();
    }
    public function render()
    {
        return view('livewire.task-create');
    }
}
