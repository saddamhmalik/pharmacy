<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements RepositoryInterface
{

    public function search($search = null, $limit = 10, $orderColumn = 'id', $orderDirection = 'asc'): Collection
    {
        return Category::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy($orderColumn, $orderDirection)
            ->limit($limit)
            ->get();
    }

    public function find($id)
    {
        return Category::find($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete($model): bool
    {
       return $model->delete();
    }
}