<?php

namespace Inspire\Menu\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Base\Services\Caches\CacheInterface;
use Inspire\Menu\Repositories\MenuRepository;

/**
 * Class MenuCacheDecorator
 * @package Inspire\Menu\Repositories\Caches
 * @copyright 2018 Inspire Group
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
