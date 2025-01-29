<?php

namespace App\Services\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseService
{
    protected $repository;

    /**
     *
     * @param Repository $repository
     */
    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     *
     * @param array $columns
     * @return void
     */
    public function all(array $columns = ['*'])
    {
        return $this->repository->all($columns);
    }

    /**
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->repository->create($data);
    }

    /**
     *
     * @param integer $id
     * @param array $data
     * @return Model
     */
    public function update(int $id, array $data): Model
    {
        return $this->repository->update($id, $data);
    }

    /**
     *
     * @param integer $id
     * @return boolean
     */
    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }

    /**
     *
     * @param array $filters
     * @param integer $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(array $filters = [],array $relationships = [], int $perPage = 10,)
    {
        return $this->repository->paginate($filters, $relationships, $perPage);
    }
}