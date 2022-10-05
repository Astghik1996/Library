<?php

namespace App\Repositories;

use App\Contracts\LibraryContract;
use App\Models\Library;
use Illuminate\Database\Eloquent\Model;

class LibraryRepo implements LibraryContract
{
    protected Library $model;
    public function __construct(Library $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->with('books')->get();
    }

    public function create(array $data): Model
    {
        // TODO: Implement create() method.
        return "";
    }

    public function delete(int $id): bool
    {
        // TODO: Implement delete() method.
        return "";
    }
    public function show(int $id, array $relations = []): Model
    {
        return $this->model->with($relations)->find($id);
    }
    public function update(array $params, array $data): bool
    {
        // TODO: Implement update() method.
        return "";
    }
}
