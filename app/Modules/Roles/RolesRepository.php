<?php

namespace BB\Modules\Roles;

use BB\Core\Database\Repository;


class RolesRepository extends Repository
{
    public function __construct(Role $model)
    {
        $this->model = $model;
        $this->initDefinition($model);

    }

}