<?php

namespace Inspire\Post\Repositories\Caches;

use Inspire\Base\Repositories\Caches\CacheDecorator;
use Inspire\Post\Repositories\PostRepository;
use Inspire\Base\Services\Caches\CacheInterface;

/**
 * Class PostCacheDecorator
 * @package Inspire\Post\Repositories\Caches
 * @copyright 2018 Inspire Group
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
