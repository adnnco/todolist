<?php

namespace App\Interfaces;

/**
 * Interface TaskRepositoryInterface
 *
 * Defines the methods required for a Task repository.
 */
interface TaskRepositoryInterface
{
    /**
     * Paginate the tasks.
     *
     * @param  int  $limit  The number of tasks per page.
     * @return mixed The paginated tasks.
     */
    public function paginate(int $limit): mixed;

    /**
     * Get all tasks.
     *
     * @return mixed The collection of all tasks.
     */
    public function getAll(): mixed;

    /**
     * Create a new task.
     *
     * @param  array  $data  The data for the new task.
     * @return mixed The created task.
     */
    public function create(array $data): mixed;

    /**
     * Update an existing task.
     *
     * @param  array  $data  The data to update the task with.
     * @param  int  $id  The ID of the task to update.
     * @return mixed The updated task.
     */
    public function update(array $data, int $id): mixed;

    /**
     * Delete a task by its ID.
     *
     * @param  int  $id  The ID of the task to delete.
     * @return mixed The result of the deletion.
     */
    public function delete(int $id): mixed;

    /**
     * Show a task by its ID.
     *
     * @param  int  $id  The ID of the task to retrieve.
     * @return mixed The task with the specified ID.
     */
    public function getById(int $id): mixed;
}
