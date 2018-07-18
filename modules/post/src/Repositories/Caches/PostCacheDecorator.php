<?php

namespace Inspire\Post\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Post\Repositories\PostRepository;
use Inspire\Base\Services\Caches\CacheInterface;

/**
 * Class PostCacheDecorator
 *
 * @package Inspire\Post\Repositories\Caches
 */
class PostCacheDecorator extends CacheDecorator implements PostRepository
{
    /**
     * @var PostRepository
     */
    protected $repository;

    /**
     * @var CacheInterface
     */
    protected $cache;

    /**
     * PostCacheDecorator constructor.
     *
     * @param PostRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(PostRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
