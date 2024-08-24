<?php

namespace App\Enums;

enum Priority
{
    case P1;
    case P2;
    case P3;
    case P4;

    public function color(): string
    {
        return match ($this) {
            Priority::P1 => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
            Priority::P2 => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
            Priority::P3 => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300',
            Priority::P4 => 'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300',
        };
    }

    /*
    case P1 = 'yellow-100';
    case P2 = 'green-100';
    case P3 = 'blue-100';
    case P4 = 'gray-100';
    */
}
