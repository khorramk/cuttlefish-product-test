<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    /**
     * The table being used for this model
     * @var string
     */
    protected $table = 'products';

    public $timestamps = false;
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
        'created_at',
        'updated_at',
    ];
}
