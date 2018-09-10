<?php

namespace Inspire\Base\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Inspire\Base\Repositories\BaseRepository;

/**
 * Class EloquentBaseRepository
 *
 * @package Inspire\Base\Repositories\Eloquent
 * @author TRINH QUOC HOA <tqhoa8th@gmail.com>
 */
abstract class EloquentBaseRepository implements BaseRepository
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * EloquentBaseRepository constructor.
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
     */
    public function fill(array $fields)
    {
        return $this->model->fill($fields);
    }

    /**
     * Get Empty Model
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get Table name
     *
     * @return mixed
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     * @return mixed
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
     */
    public function getFirstByAttributes(array $condition = [], array $select = [], array $with = [])
    {
        $query = $this->make($with);

        if (!empty($select)) {
            return $query->where($condition)->select($select)->first();
        }

        return $query->where($condition)->first();
    }

    /**
     * Retrieve model by id regardless of status.
     *
     * @param $id
     * @param array $with
     * @return mixed
     */
    public function findById($id, array $with = [])
    {
        return $this->make($with)->where('id', $id)->firstOrFail();
    }

    /**
     * Get single model by Slug.
     *
     * @param string $slug slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->firstorFail();
    }

    /**
     * Find a resource by an array of attributes
     *
     * @param  array $condition
     * @param array $select
     * @param  array $with
     * @return $model
     */
    public function getAllByAttributes(array $condition = [], array $select = [], array $with = [])
    {
        $query = $this->make($with);

        if (!empty($select)) {
            return $query->where($condition)->select($select)->first();
        }

        return $query->where($condition)->get();
    }

    /**
     * Pluck a column
     *
     * @param string $column
     * @param string $key
     * @return mixed
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
     */
    public function all(array $with = [])
    {
        $query = $this->make($with);

        return $query->get();
    }

    /**
     * Get all Modle by attributes sort order
     *
     * @param array $condition
     * @param string $orderBy
     * @param string $sortOrder
     * @param array $with
     * @return mixed
     */
    public function getAllByAttributesSortOrder(
        array $attributes,
        $orderBy = null,
        $sortOrder = 'desc'
    ){
        $query = $this->buildQueryByAttributes($attributes, $orderBy, $sortOrder);

        return $query->get();
    }

    /**
     * Get select
     *
     * @param array $select
     * @param array $condition
     * @return mixed
     */
    public function select(array $select = ['*'], array $condition = [])
    {
        return $this->model->where($condition)->select($select);
    }

    public function allWithBuilder() : Builder
    {
        return $this->model->query();
    }

    /**
     * Create a new Model
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = [])
    {
        return $this->model->create($data);
    }


    /**
     * Update a model
     *
     * @param Model $model
     * @param array $attributes
     * @return mixed
     */
    public function update(Model $model, array $data= [])
    {
        return $model->update($data);
    }


    /**
     * Update a model with ByAttributes
     *
     * @param array $condition
     * @param array $data
     * @return mixed
     */
    public function updateByAttributes(array $condition, array $data = [])
    {
        return $this->model->where($condition)->update($data);
    }

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model)
    {
        return $model->delete();
    }

    /**
     * Delete by Attributes
     * @param array $condition
     * @return mixed
     */
    public function deleteByAttributes(array $condition = [])
    {
        return $this->model->where($condition)->delete();
    }

    /**
     * Build Query to catch resources by an array of attributes and params
     *
     * @param  array $attributes
     * @param  null|string $orderBy
     * @param  string $sortOrder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    private function buildQueryByAttributes(array $attributes, $orderBy = null, $sortOrder = 'desc')
    {
        $query = $this->model->query();

        foreach ($attributes as $field => $value) {
            $query = $query->where($field, $value);
        }

        if (null !== $orderBy) {
            $query->orderBy($orderBy, $sortOrder);
        }

        return $query;
    }
}
