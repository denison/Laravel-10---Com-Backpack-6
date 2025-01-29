<?php

namespace App\Repositories\Base;

use App\Repositories\Interfaces\Base\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    /**
     * Injeta o modelo
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Retorna todos os dados
     *
     * @param array $columns
     * @return Collection
     */
    public function all(array $columns = ['*']): Collection
    {
        return $this->model->all($columns);
    }

    /**
     * Retorna uma model especifcia
     *
     * @param int $id
     * @param array $columns
     * @return Model|null
     */
    public function find($id,array $relationships = [], array $columns = ['*']): ?Model
    {
        return $this->model->with($relationships)->find($id, $columns);
    }

    /**
     * Cria uma nova mdoel
     *
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * Atualiza os dados de uma model especifica
     *
     * @param [type] $id
     * @param array $data
     * @return Model
     */
    public function update($id, array $data): Model
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    /**
     * Deleta os dados do sistema
     *
     * @param [type] $id
     * @return boolean
     */
    public function delete($id): bool
    {
        $model = $this->find($id);
        return $model->delete();
    }

    /**
     * Tras os dados Paginados 
     *
     * @param Model $model
     * @param array $filters
     * @param integer $perPage
     * @return LengthAwarePaginator
     */
    public function paginate(array $filters = [],array $relationships = [], int $perPage = 10, ): LengthAwarePaginator
    {
        $query = $this->model::query();
        foreach ($filters as $column => $value) {
            if ($this->isValidFilter($column)) {
                $this->applyFilter($query, $column, $value);
            }
        }

        if (!empty($relationships)) {
            $query->with($relationships);
        }

        // Aplica a paginação
        return $query->paginate($perPage);
    }

    /**
     *  Verifica se o filtro é válido
     *  Método terá que ser sobrescrito nos respositórios especificos
     * @param string $column
     * @return boolean
     */
    protected function isValidFilter(string $column): bool
    {
        return false;
    }

    /**
     * Aplica o filtro
     * Método deverá ser sobrescrito nos repositórios específicos.
     * @param Model $query
     * @param string $column
     * @param mixed $value
     * @return void
     */
    protected function applyFilter($query, string $column, $value): void
    {
    
    }
}