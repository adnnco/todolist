<?php

namespace App\Livewire;

use App\Models\Label;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TaskCreate extends Component
{
    private TaskRepository $taskRepository;

    public $parent_id;
    public $parent_name;

    public string $name;

    public $priority;

    public $due_date;

    public string $description;

    protected $listeners = ['parentTask'];

    public $labels;
    public $label_id;

    public function mount(): void
    {
        $this->labels = Label::all();
    }

    public function parentTask(?int $parent_id)
    {
        $task = Task::find($parent_id);

        $this->parent_id = $task->id;
        $this->parent_name = $task->name;

    }

    public function createTask(TaskRepository $taskRepository): void
    {
        $this->validate(config('request_rules.task_create'));

        $taskRepository->create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'priority' => $this->priority,
            'due_date' => $this->due_date,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'label_id' => $this->label_id
        ]);

        session()->flash('message', 'Task created successfully.');

        $this->dispatch('taskCreated');

        $this->reset();
    }

    public function render(): View
    {
        return view('livewire.task-create');
    }
}
