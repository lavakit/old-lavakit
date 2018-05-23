<?php

namespace Inspire\Base\Services\Caches;
/**
 * Interface CacheInterface
 *
 * @package Inspire\Base\Services\Caches
 */
interface CacheInterface
{
    /**
     * Retrieve data from cache
     *
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * Add data to the cache
     *
     * @param $key cache item key
     * @param $value the data fto store
     * @param null|int  $minutes the number of minutes to store the item
     * @return mixed
     */
    public function put($key, $value, $minutes = null);

    /**
     * Check cache
     *
     * @param $key
     * @return mixed
     */
    public function has($key);

    /**
     * Clear cache
     *
     * @return mixed
     */
    public function flush();
}
