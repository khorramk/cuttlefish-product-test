<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table being used for this model
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<mixed>
     */
    protected $fillable = [
        'name',
        'price',
        'description',
        'sale_price',
        'product_image_path',
        'active',
        'image_path',
    ];
}
