<?php

namespace App\Livewire;

use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TaskCreate extends Component
{

    public $parent_id;
    public $parent_name;

    public string $name;

    public $priority;

    public $due_date;

    public string $description;

    protected $listeners = ['parentTask'];

    public function parentTask(?int $parent_id)
    {
        $task = Task::find($parent_id);

        $this->parent_id = $task->id;
        $this->parent_name = $task->name;

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
            'parent_id' => $this->parent_id
        ]);

        session()->flash('message', 'Task created successfully.');

        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.task-create');
    }
}
