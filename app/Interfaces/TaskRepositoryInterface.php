<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

/**
 * Interface TaskRepositoryInterface
 *
 * Defines the methods required for a Task repository.
 */
interface TaskRepositoryInterface
{
    /**
     * Get all tasks.
     */
    public function all(): mixed;

    /**
     * Create a new task.
     */
    public function create(array $data): mixed;

    /**
     * Update an existing task.
     *
     * @param int $id
     */
    public function update(Request $data, int $id): mixed;

    /**
     * Delete a task by its ID.
     */
    public function delete(int $id): mixed;

    /**
     * Show a task by its ID.
     */
    public function show(int $id): mixed;
}
