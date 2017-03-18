<?php

namespace BB\Modules\ProductImages;

use BB\Modules\ModuleController;
use Illuminate\Http\Request;


class ProductImagesController extends ModuleController
{

    protected $resourceName = 'productImages';
    protected $viewPath = 'productImages';

   public function upload($id, Request $request){

       $prodct = $this->getRepository('Products')->model()->find($id);
       if($prodct){
           parent::storeAndGet($request ,['product_id' => $id]);
       }
       return back();

   }
}