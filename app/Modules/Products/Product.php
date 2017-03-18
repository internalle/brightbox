<?php

namespace BB\Modules\Products;

use BB\Core\Database\Model;
use BB\Modules\Companies\Company;
use BB\Modules\ProductImages\ProductImage;
use Illuminate\Database\Eloquent\Builder;



class Product extends Model  {


    protected $fillable = [
        'name',
        'stock',
        'details',
        'stock',
        'company_id'
    ];

    public function company(){

        return $this->belongsTo(Company::class);
    }

    public function images(){

        return $this->hasMany(ProductImage::class);
    }

    public static function boot()
    {
        parent::boot();

        Product::deleting(function($product)
        {
            $product->images()->delete();
        });
    }
}
