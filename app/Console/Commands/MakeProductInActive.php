<?php

namespace App\Console\Commands;

use App\Models\ProductCategory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class MakeProductInActive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:product:inactive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make product active based on product categories name';

    /**
     * Execute the console command.
     */
    public function handle()
    {
       $choice = $this->choice('Please choose product Categories name', ['Socks', 'T-shirt', 'Pants', 'Suit', 'Coat', 'Tie']);

        try {

            if ($choice !== 'Socks') {
                $this->error('Please choose different Categories for this command');
                return;
            }

          $productCategory = ProductCategory::with('products')->where('name', $choice)->get();

          if (!$productCategory) {
              $this->error('Product is not found');
          }

         $productCategory->each(function ($category) {
             $products = $category->products()->whereYear('created_at', '<=', now()->subYear(2))->get();
              foreach ($products as $key => $product) {
                  $product->active = 0;
                  $product->save();
              }
          });




          $successMessage = 'Following category Socks Products has now become inactive';
          $this->info($successMessage);

        } catch (\Exception $exception) {
            Log::error($exception->getTraceAsString());
            $this->error('Server related Error: ', $exception->getMessage());
        }
    }
}
