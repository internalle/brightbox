<?php

namespace BB\Modules\Products;


class ProductsDefinition
{
    public function validation() {
        return [
            'name' => 'required|max:255',
            'details' => 'required',
        ];
    }


    public function updateValidation() {
        return [
            'name' => 'required|max:255',
            'details' => 'required',
        ];
    }

    public function requestFields(){
        return [
            'name',
            'details',
            'stock',
        ];
    }

}