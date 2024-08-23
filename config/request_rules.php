<?php

return [
    'task_create' => [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'priority' => 'nullable|string|max:2',
        'due_date' => 'nullable|date|after:today',
    ],
];
