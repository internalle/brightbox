<?php

namespace BB\Modules\Users;

use BB\Core\Database\AuthRepository;
use BB\Core\Database\Repository;

use BB\Modules\Users\User;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UsersRepository extends Repository
{

    public function __construct(User $model)
    {
        $this->shouldBeFilterd = true;
        $this->model = $model;
        $this->initDefinition($model);

    }

    public function removeUserCompanyAndRole($user){
        $user->company()->dissociate()->save();
        $user->role()->dissociate()->save();
    }

}