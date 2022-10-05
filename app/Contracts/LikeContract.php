<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface LikeContract
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
     * @return bool
     */
    public function delete(int $id):bool;
}
