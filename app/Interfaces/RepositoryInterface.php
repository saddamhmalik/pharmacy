<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function search($search, $limit, $orderColumn, $orderDirection);
    public function find($id);
    public function create(array $data);
    public function update(Model $model, array $data);
    public function delete(Model $model);
}