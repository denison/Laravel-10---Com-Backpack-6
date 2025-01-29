<?php

namespace App\Repositories\Interfaces\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface BaseRepositoryInterface
{
    public function create(array $data): Model;
    public function update(int $id, array $data): Model;
    public function delete(int $id): bool;
    public function all(array $filters = []): Collection;
    public function find(int $id, array $relationships = []): ?Model;
    public function paginate(array $filters = [], array $relationships = [], int $perPage = 10): LengthAwarePaginator;
}