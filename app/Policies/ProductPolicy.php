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

    public function edit($user, Product $product)
    {

        if ($this->sameCompany($user, $product) && $user->isAdminOrManager()) {
            return true;
        }

        return false;
    }

    public function show($user, Product $product)
    {

        if (!$user->isApplicant() && $this->sameCompany($user, $product)) {
            return true;
        }

        return false;
    }

    private function sameCompany($user, $product)
    {
        return ($product->company_id == $user->company_id) ? true : false;
    }
}
