<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'product_code',
        'product_name',
        'product_category',
        'product_subcategory',
        'description',
        'image',
        'brand',
        'season',
        'collection',
        'barcode',
        'sku',
        'size_range',
        'fit_type',
        'size_chart',
        'material_composition',
        'base_price',
        'retails_price',
        'wholesale_price',
        'cost_price',
    ];
}
