<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class InboxTasks extends Component
{
    use WithPagination;

    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks','taskCompleted' => 'refreshTasks'];

    public function refreshTasks() {}

    public function render()
    {
        return view('livewire.inbox-tasks', [
            'tasks' => Task::where('user_id', auth()->id())->where('parent_id', 0)
                ->where('completed', 0)
                ->with('children')
                ->orderBy('priority', 'asc')->paginate(10),
        ]);
    }
}
