<?php

/**
 * Validation rules for creating a task.
 */

return [
    'task_create' => [
        'parent_id' => 'nullable|integer',
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date|after_or_equal:today',
        'priority' => 'nullable|string|max:2',
        'label_id' => 'nullable|integer',

    ],
    'label_create' => [
        'name' => 'required|string|max:255',
        'color' => 'nullable|string|max:7',
    ],
];
