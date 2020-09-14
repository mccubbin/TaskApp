<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $max = Task::max('priority');
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'name' => $this->faker->jobTitle,
            'priority' => $this->faker->unique()->numberBetween($max + 1, $max + 30),
        ];
    }
}
