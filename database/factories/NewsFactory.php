<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
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
            'title' => json_encode([
                'en' => $this->faker->sentence(3),
                'ar' => $this->faker->sentence(3),
            ]),
            'content' => json_encode([
                'en' => $this->faker->paragraph(3),
                'ar' => $this->faker->paragraph(3),
                ]),
                'slug' => $this->faker->unique()->slug,
                'image' => "news/$i"  . ".jpg",
                'author' => json_encode([
                    'en' => $this->faker->name,
                    'ar' => $this->faker->name,
                ]),
                'published_at' =>$this->faker->dateTimeBetween('-1 years', 'now'),
        ];
    
    }
}
