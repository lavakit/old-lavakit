<?php

namespace Inspire\Base\Services\Caches;

use Illuminate\Cache\CacheManager;

/**
 * Class Cache
 *
 * @package Inspire\Base\Services\Caches
 */
class Cache implements CacheInterface
{
    /**
     * @var CacheManager
     */
    protected  $cache;

    /**
     * @var null|int $minutes
     */
    protected $minutes;

    /**
     * @var string
     */
    protected $tag;

    /**
     * Cache constructor.
     *
     * @param CacheManager $cache
     * @param string $tag
     * @param bool $minutes
     */
    public function __construct(CacheManager $cacheManager, $tag, $minutes = null)
    {
        $this->cache = $cacheManager;
        $this->tag   =  $tag;
        $this->minutes  = $minutes ?: config('base.cache_time',10);
    }

    /**
     * Generate key
     *
     * @param $key
     * @return string
     */
    public function generateKey($key)
    {
        return md5($this->tag) . $key;
    }

    /**
     * Retrieve data from cache.
     *
     * @param $key
     * @return mixed|void
     */
    public function get($key)
    {
        return $this->cache->get($this->generateKey($key));
    }

    /**
     * Add data for cache
     *
     * @param cache $key
     * @param string $value
     * @param null $minutes
     * @return mixed|void
     */
    public function put($key, $value, $minutes = null)
    {
        if (is_null($minutes)) {
            $minutes = $this->minutes;
        }

        $key = $this->generateKey($key);
        $this->storeCacheKey($key);

        return $this->cache->put($key, $value, $minutes);
    }

    /**
     * Store cache key to file
     *
     * @param $key
     * @return void
     */
    public function storeCacheKey($key)
    {
        if (file_exists(config('base.cache_store'))) {
            $cacheKeys = getFileDataJson(config('base.cache_store'));
            if (!empty($cacheKeys) && !in_array($key, array_get($cacheKeys, $this->tag, []))) {
                $cacheKeys[$this->tag][] = $key;
            }
        } else {
            $cacheKeys = [];
            $cacheKeys[$this->tag][] = $key;
        }

        saveFileDataJson(config('base.cache_store'), $cacheKeys);
    }

    /**
     * Check cache
     *
     * @param $key
     * @return bool|mixed
     */
    public function has($key)
    {
        $key = $this->generateKey($key);
        return $this->cache->has($key);
    }

    /**
     * Clear a cache
     *
     * @return mixed|void
     */
    public function flush()
    {
        $cacheKeys = [];
        if (file_exists(config('base.cache_store'))) {
            $cacheKeys = getFileDataJson(config('base.cache_store'));
        }
        if (!empty($cacheKeys)) {
            $caches = array_get($cacheKeys, $this->tag);
            if ($caches) {
                foreach ($caches as $cache) {
                    $this->cache->forget($cache);
                }
                unset($cacheKeys[$this->tag]);
            }
        }
        saveFileDataJson(config('base.cache_store'), $cacheKeys);
    }
}
