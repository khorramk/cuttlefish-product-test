<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        ProductCategory::factory()->has(Product::factory()->count(50))->count(2)->create();
        ProductCategory::factory()->hasProducts(50,[
        'active' => 1,
        'updated_at' => now(),
        'created_at' => now()->subYear(2)
    ])->count(10)->create();

    }
}
