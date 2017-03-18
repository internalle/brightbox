<?php

namespace BB\Modules\Companies;

use BB\Core\Database\Repository;

class CompaniesRepository extends Repository
{
    public function __construct(Company $company)
    {
        parent::__construct($company);

    }

    public function associateUserToCompany($company,$user, $role = 4){

        $company->employees()->save($user);
        $user->role()->associate($role)->save();

    }
}