<?php

namespace BB\Policies;

use BB\Modules\Companies\Company;
use BB\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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


    public function edit($user , Company $company){

        if($user->isAdmin()){
            return true;
        }

        return false;

    }
}
