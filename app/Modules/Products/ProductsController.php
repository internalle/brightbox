<?php

namespace BB\Modules\Products;

use BB\Modules\ModuleController;
use Illuminate\Http\Request;


class ProductsController extends ModuleController
{

    protected $resourceName = 'products';
    protected $viewPath = 'products';

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware("company");
        $this->middleware('applicant')->only('index');

    }

    public function store(Request $request)
    {
        parent::storeAndGet($request ,$this->companyId);
        return response()->redirectToRoute('products.index');
    }

}