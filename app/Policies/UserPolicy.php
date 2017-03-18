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

    public function edit($user, User $employee)
    {

        if ($user->isAdmin() && $this->sameCompany($user, $employee) && ($employee->id != $user->id)) {
            return true;
        }

        return false;

    }

    public function show($user, User $employee)
    {

        if ($user->isAdminOrManager() && $this->sameCompany($user, $employee)) {
            return true;
        }

        return false;

    }

    private function sameCompany($user, $emp)
    {

        return ($emp->company_id == $user->company_id) ? true : false;
    }
}
