<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'title', 'sku', 'description'
    ];
    
    public function productvariant()
    {
        return $this->hasOne(ProductVariant::class,'product_id');
    }
}
