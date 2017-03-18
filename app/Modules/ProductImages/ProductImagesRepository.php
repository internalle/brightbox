<?php

namespace BB\Modules\ProductImages;

use BB\Core\Database\Repository;

class ProductImagesRepository extends Repository
{

    public function __construct(ProductImage $productImage)
    {
        parent::__construct($productImage);


    }

}