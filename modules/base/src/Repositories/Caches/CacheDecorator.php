<?php

namespace Inspire\Base\Repositories\Caches;

use Inspire\Base\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


/**
 * Abstract Class CacheDecorator
 *
 * @package Inspire\Base\Repositories\Caches
 */
abstract class CacheDecorator implements BaseRepository
{
    /**
     * @var mixed;
     */
    protected $repository;

    /**
     * @var mixed
     */
    protected $cache;

    /**
     * @return mixed
     */
    public function getCacheInstance()
    {
        return $this->cache;
    }

    /**
     * An array Fields
     *
     * @param array $fields
     * @return mixed
     */
    public function fill(array $fields)
    {
        return $this->getDataWithoutCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get Empty Model
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->repository->getModel();
    }

    /**
     * Get Table name
     *
     * @return mixed
     */
    public function getTable()
    {
        return $this->repository->getTable();
    }

    /**
     * Make a new instance of the entity to query on.
     * @param array $with
     * @return mixed
     */
    public function make(array $with = [])
    {
        return $this->repository->make($with);
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get single model by Slug.
     *
     * @param string $slug slug
     * @return mixed
     */
    public function findBySlug($slug)
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Find a resource by an array of attributes
     *
     * @param  array $condition
     * @param  array $select
     * @param  array $with
     * @return $model
     */
    public function getAllByAttributes(array $condition = [], array $select = [], array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get All Models
     *
     * @var array $with Eager load related models
     * @return mixed
     */
    public function all(array $with = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get all Modle by attributes sort order
     *
     * @param array $attributes
     * @param string $orderBy
     * @param string $sortOrder
     * @param array $with
     * @return mixed
     */
    public function getAllByAttributesSortOrder(array $attributes, $orderBy = null, $sortOrder = 'desc')
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataWithoutCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return Builder
     */
    public function allWithBuilder() : Builder
    {
        return $this->getDataWithoutCache(__FUNCTION__, func_get_args());
    }

    /**
     * Create a new Model
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data = []){
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }


    /**
     * Update a model
     *
     * @param Model $model
     * @param array $data
     * @return mixed
     */
    public function update(Model $model, array $data= []){
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }


    /**
     * Update a model with ByAttributes
     *
     * @param array $condition
     * @param array $data
     * @return mixed
     */
    public function updateByAttributes(array $condition, array $data = []){
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return mixed
     */
    public function delete(Model $model)
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * Delete by Attributes
     *
     * @param array $condition
     * @return mixed
     */
    public function deleteByAttributes(array $condition = [])
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * Get Data with cache
     *
     * @param $function
     * @param $args
     * @return mixed
     */
    protected function getDataIfExistCache($function, array $args)
    {
        try {
            $cacheKey = md5(get_class($this) . $function . serialize(request()->all()) . serialize(func_get_args()));

            if ($this->cache->has($cacheKey)) {
                return $this->cache->get($cacheKey);
            }

            $cacheData = call_user_func_array([$this->repository, $function], $args);

            // Store in cache for next request
            $this->cache->put($cacheKey, $cacheData);

            return $cacheData;
        } catch (Exception $ex) {
            info($ex->getMessage());
        }
    }
    /**
     * Get Data without cache
     *
     * @param $function
     * @param array $args
     * @return mixed
     */
    protected function getDataWithoutCache($function, array $args)
    {
        return call_user_func_array([$this->repository, $function], $args);
    }

    /**
     * Clear cache before do other task
     *
     * @param $function
     * @param $args
     * @param boolean $flushCache
     * @return mixed
     */
    protected function flushCacheAndUpdateData($function, $args, $flushCache = true)
    {
        if ($flushCache) {
            $this->cache->flush();
        }

        return call_user_func_array([$this->repository, $function], $args);
    }

}
