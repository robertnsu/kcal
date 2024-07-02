<?php

namespace Database\Factories;

use App\Models\Goal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoalFactory extends Factory
{
    /**
     * {@inheritdoc}
     */
    protected $model = Goal::class;

    /**
     * {@inheritdoc}
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->words(asText: true),
            'days' => $this->faker->numberBetween(1, Goal::days()->pluck('value')->sum()),
            'calories' => $this->faker->numberBetween(1600, 2500),
            'fat' => $this->faker->numberBetween(40, 90),
            'cholesterol' => $this->faker->numberBetween(int2: 500),
            'sodium' => $this->faker->numberBetween(int2: 3000),
            'carbohydrates' => $this->faker->numberBetween(50, 100),
            'protein' => $this->faker->numberBetween(90, 200),
            'iron' => $this->faker->numberBetween(10, 20),
            'calcium' => $this->faker->numberBetween(10, 20),
        ];
    }
}
