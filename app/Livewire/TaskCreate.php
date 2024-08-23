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

    public $due_date;

    public string $description;


    public function __construct()
    {
        $this->taskRepository = new TaskRepository;

    }

    public function createTask(): void
    {
        $this->validate(config('request_rules.task_create'));

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
