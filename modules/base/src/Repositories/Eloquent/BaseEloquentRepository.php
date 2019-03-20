<?php

namespace Lavakit\Base\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Lavakit\Base\Repositories\BaseRepository;

/**
 * Class BaseEloquentRepository
 * @package Lavakit\Base\Repositories\Eloquent
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
abstract class BaseEloquentRepository implements BaseRepository
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * BaseEloquentRepository constructor
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * An array Fields
     *
     * @param array $fields
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function fill(array $fields)
    {
        return $this->model->fill($fields);
    }

    /**
     * Get Empty Model
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get Table name
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * Make a new instance of the entity to query on
     *
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function make(array $with = [])
    {
        return $this->model->with($with);
    }

    /**
     * Find a single entity by key value
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getFirstBy(array $condition = [], array $select = [], array $with = [])
    {
        $query = $this->make($with);

        if (!empty($select)) {
            return $query->where($condition)->select($select)->first();
        }

        return $query->where($condition)->first();
    }

    /**
     * Retrieve model by id regardless of status
     *
     * @param $id
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findById($id, array $with = [])
    {
        return $this->make($with)->where('id', $id)->firstOrFail();
    }

    /**
     * Get single model by Slug
     *
     * @param string $slug slug
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findBySlug($slug, array $with = [])
    {
        $model = $this->make($with)->where('slug', '=', $slug)->firstOrFail();

        if (!$model) {
            abort(404);
        }

        return $model;
    }

    /**
     * Pluck a column
     *
     * @param string $column
     * @param string $key
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function pluck($column, $key = null)
    {
        return $this->model->pluck($column, $key)->all();
    }

    /**
     * Get All Models
     *
     * @var array $with Eager load related models
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function all(array $with = [])
    {
        $query = $this->make($with);

        return $query->get();
    }

    /**
     * Find a resource by an array of attributes
     *
     * @param array $condition
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function allBy(array $condition = [], array $with = [])
    {
        return $this->make($with)->where($condition)->get();
    }

    /**
     * Get select
     *
     * @param array $select
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function select(array $select = ['*'], array $condition = [])
    {
        return $this->model->where($condition)->select($select);
    }

    /**
     * @return Builder
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function allWithBuilder() : Builder
    {
        return $this->model->query();
    }

    /**
     * Create a new Model
     *
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function create(array $data = [])
    {
        return $this->model->create($data);
    }

    /**
     * Create a new model
     *
     * @param Model $model
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function createOrUpdate(Model $model)
    {
        if ($model->save()) {
            return $model;
        }
        return false;
    }

    /**
     * @param array $data
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function firstOrCreate(array $data, array $with = [])
    {
        return $this->model->firstOrCreate($data, $with);
    }

    /**
     * Update a model
     *
     * @param Model $model
     * @param array $data
     * @return bool|mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function update(Model $model, array $data = [])
    {
        return $model->update($data);
    }


    /**
     * Update a model with ByAttributes
     *
     * @param array $condition
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function updateBy(array $condition, array $data = [])
    {
        return $this->model->where($condition)->update($data);
    }

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return bool|mixed|null
     * @throws \Exception
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * Delete by Attributes
     *
     * @param array $condition
     * @return bool|mixed|null
     * @throws \Exception
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function deleteBy(array $condition = [])
    {
        return $this->model->where($condition)->delete();
    }

    /**
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function count(array $condition = [])
    {
        return $this->model->where($condition)->count();
    }

    /**
     * @param $column
     * @param array $value
            * @param array $args
            * @return mixed
            * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getByWhereIn($column, array $value = [], array $args = [])
    {
        $records = $this->model->whereIn($column, $value);

        if (!empty(array_get($args, 'where'))) {
            $records = $records->where($args['where']);
        }

        if (!empty(array_get($args, 'paginate'))) {
            return $records->paginate($args['paginate']);
        }

        if (!empty(array_get($args, 'limit'))) {
            $records = $records->limit($args['limit']);
        }

        return $records->get();
    }

}
