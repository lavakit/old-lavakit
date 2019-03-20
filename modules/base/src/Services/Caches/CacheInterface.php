<?php

namespace Lavakit\Base\Services\Caches;

/**
 * Interface CacheInterface
 * @package Lavakit\Base\Services\Caches
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
interface CacheInterface
{
    /**
     * Retrieve data from cache
     *
     * @param $key
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function get($key);

    /**
     * Add data to the cache
     *
     * @param $key
     * @param $value
     * @param null $minutes
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function put($key, $value, $minutes = null);

    /**
     * Check cache
     *
     * @param $key
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function has($key);

    /**
     * Clear cache
     *
     * @return mixed
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function flush();
}
