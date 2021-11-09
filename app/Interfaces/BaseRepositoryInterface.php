<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function all() :Collection;

    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(int $id) :Model;

    /**
     * 
     * @throws \InvalidArgumentException
     */
    public function paginate(
        ?int $perPage = null, 
        array $columns = ['*'], 
        string $pageName = 'page', 
        ?int $page = null
    ) :LengthAwarePaginator;

    public function getModel() :Model;

}
