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

          $productCategory = ProductCategory::where('name', $choice)->first();

          if (!$productCategory) {
              $this->error('Product is not found');
          }

          $productCategory->products()->first()->active = 0;
          $productCategory->products()->first()->save();
          $successMessage = 'The follwing product is inactive: ' . (string) $productCategory->products()->first()->name;
          $this->info($successMessage);

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
            $this->error('Server related Error: ', $exception->getMessage());
        }
    }
}
