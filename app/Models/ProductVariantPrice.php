<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariantPrice extends Model
{
    protected $table = 'product_variant_prices';
    protected $fillable = [
        'title', 'sku', 'description'
    ];

    public function product()
    {
        return $this->belongsTo('App\ProductVariant','product_id');
    }
}
