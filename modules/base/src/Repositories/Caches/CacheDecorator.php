<?php

namespace Lavakit\Base\Repositories\Caches;

use Lavakit\Base\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Exception;

/**
 * Class CacheDecorator
 * @package Lavakit\Base\Repositories\Caches
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
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
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function fill(array $fields)
    {
        return $this->getDataWithoutCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get Empty Model
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getModel()
    {
        return $this->repository->getModel();
    }

    /**
     * Get Table name
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function getTable()
    {
        return $this->repository->getTable();
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
        return $this->repository->make($with);
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataWithoutCache(__FUNCTION__, func_get_args());
    }

    /**
     * @return Builder
     * @author hoatq <tqhoa8th@gmail.com>
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
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function create(array $data = [])
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
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
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_arg());
    }

    /**
     * @param array $data
     * @param array $with
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function firstOrCreate(array $data, array $with = [])
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * Update a model
     *
     * @param Model $model
     * @param array $data
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function update(Model $model, array $data = [])
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
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
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * Delete a Model
     *
     * @param Model $model
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
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
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function deleteBy(array $condition = [])
    {
        return $this->flushCacheAndUpdateData(__FUNCTION__, func_get_args());
    }

    /**
     * @param array $condition
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function count(array $condition = [])
    {
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
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
        return $this->getDataIfExistCache(__FUNCTION__, func_get_args());
    }

    /**
     * Get Data with cache
     *
     * @param $function
     * @param array $args
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
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

            return call_user_func_array([$this->repository, $function], $args);
        }
    }

    /**
     * Get Data without cache
     *
     * @param $function
     * @param array $args
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
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
     * @author hoatq <tqhoa8th@gmail.com>
     */
    protected function flushCacheAndUpdateData($function, $args, $flushCache = true)
    {
        if ($flushCache) {
            $this->cache->flush();
        }

        return call_user_func_array([$this->repository, $function], $args);
    }
}
