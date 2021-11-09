<?php

namespace App\Repositories;

use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all() :Collection
    {
        return $this->model->all();
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
        ?int $perPage = 2, 
        array $columns = ['*'], 
        string $pageName = 'page', 
        ?int $page = null
    ) :LengthAwarePaginator
    {
        return $this->model->paginate($perPage, $columns, $pageName, $page);
    }

    public function getModel() :Model
    {
        return $this->model;
    }

}
