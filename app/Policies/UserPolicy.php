<?php

namespace BB\Policies;

use BB\Modules\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function edit($user , User $employee){

        if($user->isAdmin() && ($user->company_id == $employee->company_id)  && ($employee->id != $user->id) ){
            return true;
        }

        return false;

    }
}
