<?php

namespace App\Repositories;

use App\Interfaces\LabelRepositoryInterface;
use App\Models\Label;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class LabelRepository
 *
 * Implements the LabelRepositoryInterface to provide methods for managing labels.
 */
class LabelRepository implements LabelRepositoryInterface
{
    /**
     * Get all labels.
     *
     * @return Collection The collection of all labels.
     */
    public function getAll(): Collection
    {
        return Label::all();
    }

    /**
     * Create a new label.
     *
     * @param  array  $data  The data for the new label.
     * @return mixed The created label.
     */
    public function create(array $data): mixed
    {

        return Label::create($data);
    }

    /**
     * Update an existing label.
     *
     * @param  array  $data  The data to update the label with.
     * @param  int  $id  The ID of the label to update.
     * @return mixed The updated label.
     */
    public function update(array $data, int $id): mixed
    {
        $label = Label::findOrFail($id);
        $label->update($data);
        $label->save();

        return $this->getById($id);
    }

    /**
     * Delete a label by its ID.
     *
     * @param  int  $id  The ID of the label to delete.
     * @return int The result of the deletion.
     */
    public function delete(int $id): int
    {
        return Label::destroy($id);
    }

    /**
     * Get a label by its ID.
     *
     * @param  int  $id  The ID of the label to retrieve.
     * @return mixed The label with the specified ID.
     */
    public function getById(int $id): mixed
    {
        return Label::findOrFail($id);
    }

    public function paginate(int $limit): mixed
    {
        return Label::paginate($limit);
    }
}
