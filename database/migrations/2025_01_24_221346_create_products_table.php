<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price')->nullable();
            $table->longText('description')->nullable();
            $table->float('sale_price')->nullable();
            $table->string('product_image_path')->nullable();
            $table->unsignedBigInteger('product_categories_id')->nullable();
            $table->boolean('active')->nullable();
            $table->foreign('product_categories_id')->references('id')->on('product_categories')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
