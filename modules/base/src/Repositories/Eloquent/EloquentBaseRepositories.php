<?php

namespace Inspire\Base\Repositories\Eloquent;

use Inspire\Base\Repositories\BaseReponsitory;
use Illuminate\Database\Eloquent\Model;

abstract class EloquentBaseRepositories implements BaseReponsitory
{
    /**
     * @var $model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->model->all();
    }

    public function getById($id)
    {
        // TODO: Implement getById() method.
        return $this->model->find($id);
    }

    public function create(array $attributes = [])
    {
        // TODO: Implement create() method.
        return $this->model->create($attributes);
    }

    public function update($id, array $attributes = [])
    {
        // TODO: Implement update() method.
        return $this->model->find($id)->update($attributes);
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        return $this->model-$this->delete();
    }
}
