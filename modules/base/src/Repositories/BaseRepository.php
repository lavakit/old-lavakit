<?php

namespace Lavakit\Base\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface BaseRepository
 * @package Lavakit\Base\Repositories
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface BaseRepository
{
    /**
     * An array Fields
     *
     * @param array $fields
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function fill(array $fields);

    /**
     * Get Empty Model
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getModel();

    /**
     * Get Table name
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getTable();

    /**
     * Make a new instance of the entity to query on
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function make(array $with = []);

    /**
     * Find a single entity by key value
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getFirstBy(array $condition = [], array $select = [], array $with = []);

    /**
     * Retrieve model by id regardless of status
     *
     * @param $id
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findById($id, array $with = []);

    /**
     * Get single model by Slug
     *
     * @param string $slug slug
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function findBySlug($slug, array $with = []);

    /**
     * Pluck a column
     *
     * @param string $column
     * @param string $key
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function pluck($column, $key = null);

    /**
     * Get All Models
     *
     * @var array $with Eager load related models
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function all(array $with = []);

    /**
     * Find a resource by an array of attributes
     *
     * @param array $condition
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function allBy(array $condition = [], array $with = []);

    /**
     * Get select
     *
     * @param array $select
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function select(array $select = ['*'], array $condition = []);

    /**
     * @return Builder
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function allWithBuilder() : Builder;

    /**
     * Create a new Model
     *
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function create(array $data = []);

    /**
     * Create a new model
     *
     * @param Model $model
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function createOrUpdate(Model $model);

    /**
     * @param array $data
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function firstOrCreate(array $data, array $with = []);

    /**
     * Update a model
     *
     * @param Model $model
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function update(Model $model, array $data = []);

    /**
     * Update a model with ByAttributes
     *
     * @param array $condition
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function updateBy(array $condition, array $data = []);

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function delete(Model $model);

    /**
     * Delete by Attributes
     *
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function deleteBy(array $condition = []);

    /**
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function count(array $condition = []);

    /**
     * @param $column
     * @param array $value
     * @param array $args
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getByWhereIn($column, array $value = [], array $args = []);
}
