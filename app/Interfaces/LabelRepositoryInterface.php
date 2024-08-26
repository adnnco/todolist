<?php

namespace App\Interfaces;

/**
 * Interface LabelRepositoryInterface
 *
 * Provides methods for managing labels.
 */
interface LabelRepositoryInterface
{

    /**
     * Paginate the labels.
     *
     * @param  int  $limit  The number of tasks per page.
     * @return mixed The paginated tasks.
     */
    public function paginate(int $limit): mixed;

    /**
     * Get all labels.
     *
     * @return mixed The collection of all labels.
     */
    public function getAll(): mixed;

    /**
     * Create a new label.
     *
     * @param  array  $data  The data for the new label.
     * @return mixed The created label.
     */
    public function create(array $data): mixed;

    /**
     * Update an existing label.
     *
     * @param  array  $data  The data to update the label with.
     * @param  int  $id  The ID of the label to update.
     * @return mixed The updated label.
     */
    public function update(array $data, int $id): mixed;

    /**
     * Delete a label by its ID.
     *
     * @param  int  $id  The ID of the label to delete.
     * @return mixed The result of the deletion.
     */
    public function delete(int $id): mixed;

    /**
     * Get a label by its ID.
     *
     * @param  int  $id  The ID of the label to retrieve.
     * @return mixed The label with the specified ID.
     */
    public function getById(int $id): mixed;
}
