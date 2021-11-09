<?php

namespace App\Interfaces;

interface UserRespositoryInterface extends BaseRepositoryInterface 
{
    public function getAuthUser();
}
