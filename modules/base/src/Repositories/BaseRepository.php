<?php

namespace Inspire\Base\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface BaseRepository
 *
 * @package Inspire\Base\Repositories
 * @author TRINH QUOC HOA <tqhoa8th@gmail.com>
 */
interface BaseRepository
{
    /**
     * An array Fields
     *
     * @param array $fields
     * @return mixed
     */
    public function fill(array $fields);

    /**
     * Get Empty Model
     *
     * @return mixed
     */
    public function getModel();

    /**
     * Get Table name
     *
     * @return mixed
     */
    public function getTable();

    /**
     * Make a new instance of the entity to query on.
     * @param array $with
     * @return mixed
     */
    public function make(array $with = []);

    /**
     * Find a single entity by key value
     *
     * @param array $condition
     * @param array $select
     * @param array $with
     * @return mixed
     */
    public function getFirstByAttributes(array $condition = [], array $select = [], array $with = []);

    /**
     * Retrieve model by id regardless of status.
     *
     * @param $id
     * @param array $with
     * @return mixed
     */
    public function findById($id, array $with = []);

    /**
     * Get single model by Slug.
     *
     * @param string $slug slug
     * @return mixed
     */
    public function findBySlug($slug);

    /**
     * Find a resource by an array of attributes
     *
     * @param  array $condition
     * @param  array $select
     * @param  array $with
     * @return $model
     */
    public function getAllByAttributes(array $condition = [], array $select = [], array $with = []);

    /**
     * Pluck a column
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function pluck($column, $key = null);

    /**
     * Get All Models
     *
     * @var array $with Eager load related models
     * @return mixed
     */
    public function all(array $with = []);

    /**
     * Get all Modle by attributes sort order
     *
     * @param array $attributes
     * @param string $orderBy
     * @param string $sortOrder
     * @param array $with
     * @return mixed
     */
    public function getAllByAttributesSortOrder(array $attributes, $orderBy = null, $sortOrder = 'desc');

    /**
     * Get select
     *
     * @param array $select
     * @param array $condition
     * @return mixed
     */
    public function select(array $select = ['*'], array $condition = []);

    /**
     * @return Builder
     */
    public function allWithBuilder() : Builder;

    /**
     * Create a new Model
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []);


    /**
     * Update a model
     *
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    public function update(Model $model, array $data= []);


    /**
     * Update a model with ByAttributes
     *
     * @param array $condition
     * @param array $data
     * @return mixed
     */
    public function updateByAttributes(array $condition, array $data = []);

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model);

    /**
     * Delete by Attributes
     *
     * @param array $condition
     * @return mixed
     */
    public function deleteByAttributes(array $condition = []);
}
