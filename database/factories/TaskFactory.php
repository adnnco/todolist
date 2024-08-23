<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'parent_id' => Task::inRandomOrder()->first()->id ?? null,
            'name' => $this->faker->sentence,
            'priority' => $this->faker->randomElement(['P1', 'P2', 'P3', 'P4']),
            'due_date' => $this->faker->dateTimeBetween('-3 months', '+1 year'),
            'description' => $this->faker->paragraph,
            'user_id' => User::inRandomOrder()->first()->id,
            'completed' => $this->faker->boolean,
        ];
    }
}
