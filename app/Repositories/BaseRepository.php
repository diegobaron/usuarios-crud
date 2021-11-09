<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    protected array $filters = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function get($columns = ['*']) :Collection
    {
        $query = $this->newQuery();
        return $this->buildWhere($query)->get($columns);
    }

    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findOrFail(int $id) :Model
    {
        return $this->model->findOrFail($id);
    }

    /**
     * 
     * @throws \InvalidArgumentException
     */
    public function paginate(
        ?int $perPage = 5, 
        array $columns = ['*'], 
        string $pageName = 'page', 
        ?int $page = null
    ) :LengthAwarePaginator
    {
        $query = $this->newQuery();
        return $this->buildWhere($query)->paginate($perPage, $columns, $pageName, $page);
    }

    public function buildWhere(Builder $query) :Builder
    {   
        if(!$this->hasFilters()) {
            return $query;
        }
        //
        return $query;
    }

    public function setFilters(array $filters = []) :BaseRepository
    {
        $this->filters = array_merge($this->filters, $filters);
        return $this;
    }

    public function getFilters() :array
    {
        return $this->filters;
    }

    public function hasFilters() :bool
    {
        return !empty($this->getFilters());
    }

    public function clearFilters() :BaseRepository
    {
        $this->filters = [];
        return $this;
    }

    public function newQuery() :Builder
    {
        return $this->model->newQuery();
    }

    public function getModel() :Model
    {
        return $this->model;
    }

}
