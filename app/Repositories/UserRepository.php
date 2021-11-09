<?php

namespace App\Repositories;

use App\Interfaces\UserRespositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRespositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
