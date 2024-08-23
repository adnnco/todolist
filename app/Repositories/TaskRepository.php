<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{

    public function getAll(): Collection
    {
        return Task::all();
    }

    public function create(array $data): mixed
    {
        return Task::create($data);
    }

    public function update(array $data, int $id): mixed
    {
        return Task::findOrFail($id)->update($data);
    }

    public function delete(int $id): mixed
    {
        return Task::destroy($id);
    }

    public function getById(int $id): mixed
    {
        return Task::findOrFail($id);
    }

    public function paginate(int $limit): mixed
    {
       return Task::paginate($limit);
    }
}
