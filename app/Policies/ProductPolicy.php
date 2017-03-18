<?php

namespace BB\Policies;

use BB\Modules\Products\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function edit($user , Product $product){

        if(($user->company_id == $product->company_id) && $user->isAdminOrManager()){
            return true;
        }

        return false;

    }
}
