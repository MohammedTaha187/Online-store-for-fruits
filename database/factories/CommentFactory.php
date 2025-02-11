<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ]),
            'comment'=> json_encode([
                'en' => $this->faker->text(),
                'ar' => $this->faker->text(),
                ]),
                'news_id' => News::inRandomOrder()->value('id') ?? News::factory()->create()->id,
                'product_id' => Product::inRandomOrder()->value('id') ?? News::factory()->create()->id,
                'user_id' => User::inRandomOrder()->value('id') ?? News::factory()->create()->id,



        ];
    }
}
