<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class TaskRepository
 *
 * Implements the TaskRepositoryInterface to provide methods for managing tasks.
 */
class TaskRepository implements TaskRepositoryInterface
{
    /**
     * Get all tasks.
     *
     * @return Collection The collection of all tasks.
     */
    public function getAll(): Collection
    {
        return Task::all();
    }

    /**
     * Create a new task.
     *
     * @param  array  $data  The data for the new task.
     * @return mixed The created task.
     */
    public function create(array $data): mixed
    {
        return Task::create($data);
    }

    /**
     * Update an existing task.
     *
     * @param  array  $data  The data to update the task with.
     * @param  int  $id  The ID of the task to update.
     * @return mixed The updated task.
     */
    public function update(array $data, int $id): mixed
    {
        $task = Task::findOrFail($id);
        $task->update($data);
        $task->save();

        return $this->getById($id);
    }

    /**
     * Delete a task by its ID.
     *
     * @param  int  $id  The ID of the task to delete.
     * @return int The result of the deletion.
     */
    public function delete(int $id): int
    {
        return Task::destroy($id);
    }

    /**
     * Get a task by its ID.
     *
     * @param  int  $id  The ID of the task to retrieve.
     * @return mixed The task with the specified ID.
     */
    public function getById(int $id): mixed
    {
        return Task::findOrFail($id);
    }

    /**
     * Paginate the tasks.
     *
     * @param  int  $limit  The number of tasks per page.
     * @return mixed The paginated tasks.
     */
    public function paginate(int $limit): mixed
    {
        return Task::paginate($limit);
    }
}
