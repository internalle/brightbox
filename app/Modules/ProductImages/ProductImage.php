<?php

namespace BB\Modules\ProductImages;

use BB\Core\Database\Model;
use BB\Modules\Products\Product;

class ProductImage extends Model  {


    protected $fillable = [
        'name',
        'product_id',
    ];


    public function product(){

        return $this->belongsTo(Product::class);
    }

}
