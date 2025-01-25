<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductCategory>
 */
class ProductCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Socks', 'T-shirt', 'Pants', 'Tie']),
            'category_link' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'image_path' => $this->faker->imageUrl(),
        ];
    }
}
