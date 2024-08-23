<?php

namespace App\Livewire;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TaskCreate extends Component
{
    public string $name;

    public string $priority;

    public string $due_date;

    public string $description;

    protected array $rules = [
        'name' => 'required|string|max:255',
        'priority' => 'nullable|string|max:2',
        'due_date' => 'nullable|date|after:today',
        'description' => 'nullable|string',
    ];

    public function __construct()
    {
        $this->taskRepository = new TaskRepository;

    }

    public function createTask(): void
    {
        $this->validate();

        Task::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'description' => $this->description,
        ]);

        session()->flash('message', 'Task created successfully.');

        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.task-create');
    }
}
