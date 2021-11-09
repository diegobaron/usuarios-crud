<?php

namespace App\Repositories;

use App\Interfaces\UserRespositoryInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserRepository extends BaseRepository implements UserRespositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function buildWhere(Builder $query) :Builder
    {
        if(!$this->hasFilters()) {
            return $query;
        }
        $filters = $this->getFilters();
        if(isset($filters['not_user_id']) && !empty($filters['not_user_id'])) {
            $query->whereKeyNot($filters['not_user_id']);
        }
        return $query;
    }

    public function getAuthUser()
    {
        return Auth::user();
    }
}
