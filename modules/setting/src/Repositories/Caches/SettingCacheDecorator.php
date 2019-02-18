<?php

namespace Inspire\Setting\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Base\Services\Caches\CacheInterface;
use Inspire\Setting\Repositories\SettingRepository;

/**
 * Class SettingCacheDecorator
 * @package Inspire\Setting\Repositories\Caches
 * @copyright 2019 Inspire Group
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
