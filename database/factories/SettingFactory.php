<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_address' => json_encode([
                'en' =>$this->faker->address(),
                'ar' => $this->faker->address(),
            ]),
            'country_name' => json_encode([
                'en' => $this->faker->country(),
                'ar' =>$this->faker->country(),
            ]),
            'shop_hours'=> json_encode([
                'en' =>$this->faker->time(),
                'ar' =>$this->faker->time(),
             ]),
             'contact_phone'=> json_encode([
                'en' => $this->faker->phoneNumber(),
                'ar'=> $this->faker->phoneNumber(),
            ]),
            'contact_email' => json_encode([
                'en' => $this->faker->email(),
                'ar'=>$this->faker->email(),
            ]),
        ];
    }
}
