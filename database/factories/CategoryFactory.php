<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),

            ]),
            'desc'=> json_encode([
                'en' => $this->faker->sentence(),
                'ar' =>$this->faker->sentence(),
            ]),
        ];
    }
}
