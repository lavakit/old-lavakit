<?php

namespace Inspire\Posts\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Posts\Repositories\PostsRepository;
use Inspire\Base\Services\Caches\CacheInterface;

/**
 * Class PostCacheDecorator
 *
 * @package Inspire\Posts\Repositories\Caches
 */
class PostCacheDecorator extends CacheDecorator implements PostsRepository
{
    /**
     * @var PostsRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * PostCacheDecorator constructor.
     *
     * @param PostsRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(PostsRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
