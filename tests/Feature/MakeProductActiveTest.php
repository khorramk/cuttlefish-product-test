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

       $productCategory = new ProductCategory();

       $productCategory->name = 'Socks';
       $productCategory->category_link = 'https://cuttlefish.com/products/categories/clothes';

       $productCategory->save();
       $productCategory->products()->create([
        'name' => 'Fluffy Socks',
        'price' => 0.99,
        'active' => 1
       ]);

        $message = 'The follwing product is inactive: '. (string) $productCategory->products()->first()->name;

        $this->artisan('make:product:inactive')
                        ->expectsChoice('Please choose product Categories name', 'Socks', ['Pants', 'Tie', 'Socks', 'Suit', 'Coat', 'T-shirt'])
                        ->doesntExpectOutput('Successfull')
                        ->expectsOutput($message);

    }
}
