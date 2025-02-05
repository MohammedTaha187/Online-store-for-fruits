<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $i = 0;
        
$i++;

        return [
            'name' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),
            'desc'
            => json_encode([
                'en' => $this->faker->sentence(3),
                'ar' => $this->faker->sentence(3),
            ]),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'image' => "prod/$i"  . ".jpg", 
        ];
    }
}
