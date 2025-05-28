<?php

namespace Modules\Task\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = \Modules\Task\Models\Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
         return [
            'user_id' => 2,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pendente', 'em andamento', 'concluída']),
        ];
    }
}

