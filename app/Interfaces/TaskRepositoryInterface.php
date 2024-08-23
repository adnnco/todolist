<?php

namespace App\Interfaces;

/**
 * Interface TaskRepositoryInterface
 *
 * Defines the methods required for a Task repository.
 */
interface TaskRepositoryInterface
{
    public function paginate(int $limit): mixed;

    /**
     * Get all tasks.
     */
    public function getAll(): mixed;

    /**
     * Create a new task.
     */
    public function create(array $data): mixed;

    /**
     * Update an existing task.
     */
    public function update(array $data, int $id): mixed;

    /**
     * Delete a task by its ID.
     */
    public function delete(int $id): mixed;

    /**
     * Show a task by its ID.
     */
    public function getById(int $id): mixed;
}
