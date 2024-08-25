<?php

/**
 * Validation rules for creating a task.
 */

return [
    'task_create' => [
        'parent_id' => 'nullable|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'nullable|string|max:2',
        'due_date' => 'nullable|date|after:today',
    ],
    'label_create' => [
        'name' => 'required|string|max:255',
        'color' => 'nullable|string|max:7',
    ],
];
