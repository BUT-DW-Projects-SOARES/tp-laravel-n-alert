<?php

namespace Database\Factories;

use App\Models\Alert;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Alert>
 */
class AlertFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->text(),
            'published_at' => fake()->dateTimeThisMonth(),
            'category_id' => Category::inRandomOrder()->first(),
        ];
    }
}
