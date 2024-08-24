<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class InboxTasks extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.inbox-tasks', [
            'tasks' => Task::where('user_id', auth()->id())->where('parent_id', 0)
                ->where('completed', 0)
                ->with('subtasks')
                ->orderBy('priority', 'asc')
                ->paginate(10),
        ]);
    }
}
