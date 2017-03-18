<?php

namespace BB\Modules\Companies;


use BB\Core\Database\Model;
use BB\Modules\Products\Product;
use BB\Modules\Users\User;

class Company extends Model  {

    protected $fillable = [
        'name',
        'email',
        'contact',
        'phone',

    ];

    public function employees(){

        return $this->hasMany(User::class);
    }

    public function products(){

        return $this->hasMany(Product::class);
    }
}
