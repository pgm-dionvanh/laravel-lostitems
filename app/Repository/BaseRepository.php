<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    abstract protected function getModel(): Model | Builder;

    public function all(array $columns = ['*'], array $relations = []): Collection
    {
        return $this->getModel()->with($relations)->get($columns);
    }

    public function find(int $id, array $relations = [], array $columns = ['*']): ?Model
    {
        return $this->getModel()->with($relations)->find($id, $columns);
    }

    public function findOrFail(int $id, array $columns = ['*'], array $relations = []): ?Model
    {
        return $this->getModel()->with($relations)->findOrFail($id, $columns);
    }

    public function push(Model $model): bool
    {
        $pushed = $model->push();

        if ($pushed) {
            $model->refresh();
        }

        return $pushed;
    }

    public function countBy(string $column, $value, string $operator = '='): int
    {
        return $this->getModel()
            ->where($column, $operator, $value)
            ->count();
    }

    public function updateOrCreate(array $attributes = [], array $values = []): Model
    {
        return $this->getModel()->updateOrCreate($attributes, $values);
    }
}
