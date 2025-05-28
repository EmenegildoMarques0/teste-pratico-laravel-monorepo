<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Task\App\Models\Task;
use Modules\Task\Models\Task as ModelsTask;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    protected $model = ModelsTask::class;
    /**
     * Define the model's default state.
     *
     * 
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pendente', 'em_andamento', 'concluida']),
        ];
    }
}
