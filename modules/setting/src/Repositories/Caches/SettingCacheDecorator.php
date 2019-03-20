<?php

namespace Lavakit\Setting\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Base\Services\Caches\CacheInterface;
use Lavakit\Setting\Repositories\SettingRepository;

/**
 * Class SettingCacheDecorator
 * @package Lavakit\Setting\Repositories\Caches
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class SettingCacheDecorator extends CacheDecorator implements SettingRepository
{
    /**
     * @var SettingRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * SettingCacheDecorator constructor.
     * @param SettingRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(SettingRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
