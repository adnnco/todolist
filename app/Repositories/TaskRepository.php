<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskRepository implements TaskRepositoryInterface
{

    public function all(): mixed
    {
        return Task::all();
    }

    public function create(array $data): mixed
    {
        return Task::create($data);
    }

    public function update(Request $data, int $id): mixed
    {
        return Task::findOrFail($id)->update($data);
    }

    public function delete(int $id): mixed
    {
        return Task::destroy($id);
    }

    public function show(int $id): mixed
    {
        return Task::findOrFail($id);
    }
}
