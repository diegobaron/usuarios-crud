<?php

namespace App\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryInterface
{
    public function get($columns = ['*']) :Collection;

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

    public function buildWhere(Builder $query) :Builder;

    public function setFilters(array $filters = []) :BaseRepositoryInterface;

    public function getFilters() :array;

    public function hasFilters() :bool;

    public function clearFilters() :BaseRepositoryInterface;

    public function newQuery() :Builder;

    public function getModel() :Model;

}
