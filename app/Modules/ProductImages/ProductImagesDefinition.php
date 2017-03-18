<?php

namespace BB\Modules\ProductImages;


class ProductImagesDefinition
{
    public function validation() {
        return [
            'name' => 'required',
        ];
    }


    public function updateValidation() {
        return [];
    }

    public function requestFields(){
        return [
            'name',

        ];
    }

}