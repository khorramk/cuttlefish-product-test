<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MakeProductActiveTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Testing the command for active products
     */
    public function test_product_is_not_active_if_prodcut_categories_is_socks(): void
    {

        ProductCategory::factory()->hasProducts(50,[
            'active' => 1,
            'updated_at' => now(),
            'created_at' => now(),
        ])->count(10)->create();


        $message = 'Following category Socks Products has now become inactive';

        $this->artisan('make:product:inactive')
                        ->expectsChoice('Please choose product Categories name', 'Socks', ['Pants', 'Tie', 'Socks', 'Suit', 'Coat', 'T-shirt'])
                        ->doesntExpectOutput('Successfull')
                        ->expectsOutput($message);

    }

/**
     * Testing the command for non active products and added two years ago
     */
    public function test_product_is_not_active_if_prodcut_categories_is_socks_and_old(): void
    {
        ProductCategory::factory()->hasProducts(50,[
            'active' => 1,
            'updated_at' => now(),
            'created_at' => now()->subYear(2)
        ])->count(10)->create();


        $message = 'Following category Socks Products has now become inactive';

        $this->artisan('make:product:inactive')
                        ->expectsChoice('Please choose product Categories name', 'Socks', ['Pants', 'Tie', 'Socks', 'Suit', 'Coat', 'T-shirt'])
                        ->doesntExpectOutput('Successfull')
                        ->expectsOutput($message);

    }
}
