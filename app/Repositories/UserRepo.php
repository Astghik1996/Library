<?php

namespace App\Repositories;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepo implements UserContract
{
    protected User $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    /**
     * @param array $params
     * @param array $data
     * @return bool
     */
    public function update(array $params, array $data): bool
    {
        return $this->model->where($params)->update($data);
    }

    /**
     * @param int $id
     * @param array $relations
     * @return Model
     */
    public function show(int $id, array $relations=[]): Model
    {
        return $this->model->with($relations)->find($id);
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        return $this->model->destroy($id);
    }

    /**
     *
     */
    public function getAll()
    {
        return $this->model->get();
    }
}
