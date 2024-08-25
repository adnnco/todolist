<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class UpcomingTasks extends Component
{
    use WithPagination;

    protected $listeners = ['taskUpdated' => 'refreshTasks', 'taskDeleted' => 'refreshTasks','taskCompleted' => 'refreshTasks'];

    public function refreshTasks() {}


    public function render()
    {
        return view('livewire.upcoming-tasks', [
            'tasks' => Task::where('user_id', auth()->id())
                ->whereDate('due_date', '>', Carbon::today())
                ->where('completed', 0)
                ->paginate(10),
        ]);
    }
}
