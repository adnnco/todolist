<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class ComplatedTasks extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.complated-tasks', [
            'tasks' => Task::where('user_id', auth()->id())
                ->where('completed', 1)
                ->get(),
        ]);
    }
}
