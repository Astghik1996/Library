<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface UserContract
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data):Model;

    /**
     * @param array $params
     * @param array $data
     * @return bool
     */
    public function update(array $params, array $data):bool;

    /**
     * @param int $id
     * @param array $relations
     * @return Model
     */
    public function show(int $id, array $relations=[]):Model;

    public function getAll();

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;
}
