<?php

namespace App\Livewire;

use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class UpcomingTasks extends Component
{
    use WithPagination;

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
