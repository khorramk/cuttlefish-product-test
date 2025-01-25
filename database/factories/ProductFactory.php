<?php

namespace Database\Factories;

use App\Models\ProductCategory;
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
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0.10, 500),
            'description' => $this->faker->paragraph(),
            'sale_price' => $this->faker->randomFloat(2, 0.10, 500),
            'product_image_path' => $this->faker->imageUrl(),
            'product_categories_id' => ProductCategory::factory(),
            'active' => 1,
            ];
    }
}
