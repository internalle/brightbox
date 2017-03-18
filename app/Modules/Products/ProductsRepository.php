<?php

namespace BB\Modules\Products;

use BB\Core\Database\Repository;

class ProductsRepository extends Repository
{


    public function __construct(Product $product)
    {
        $this->shouldBeFilterd = true;
        parent::__construct($product);

    }

}