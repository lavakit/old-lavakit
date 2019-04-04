<?php

namespace Lavakit\Post\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Post\Repositories\PostRepository;
use Lavakit\Base\Services\Caches\CacheInterface;

/**
 * Class PostCacheDecorator
 * @package Lavakit\Post\Repositories\Caches
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
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
