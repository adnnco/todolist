<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class TaskResource
 *
 * Transforms the Task model into a JSON representation.
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request  The request object.
     * @return array<string, mixed> The transformed resource as an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'due_date' => $this->due_date_formated,
            'priority' => $this->priority,
            'labels' => $this->labels,
            'status' => $this->status,
            'subtasks' => $this->subtasks,
        ];
    }
}
