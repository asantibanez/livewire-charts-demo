<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Expense::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->randomElement(['food', 'travel', 'entertainment', 'shopping', 'other']),
            'description' => $this->faker->words(3, true),
            'amount' => $this->faker->numberBetween(10, 200),
        ];
    }
}
