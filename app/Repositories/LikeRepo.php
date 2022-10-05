<?php

namespace App\Repositories;

use App\Contracts\LikeContract;
use App\Models\Like;
use Illuminate\Database\Eloquent\Model;

class LikeRepo implements LikeContract
{
    protected Like $model;
    public function __construct(Like $model)
    {
        $this->model = $model;
    }


    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(array $params, array $data): bool
    {
        return $this->model->where($params)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

}
