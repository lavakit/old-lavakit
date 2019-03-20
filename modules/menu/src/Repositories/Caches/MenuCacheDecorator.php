<?php

namespace Lavakit\Menu\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Base\Services\Caches\CacheInterface;
use Lavakit\Menu\Repositories\MenuRepository;

/**
 * Class MenuCacheDecorator
 * @package Lavakit\Menu\Repositories\Caches
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class MenuCacheDecorator extends CacheDecorator implements MenuRepository
{
    /**
     * @var MenuRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * MenuCacheDecorator constructor.
     * @param MenuRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(MenuRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
