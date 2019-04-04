<?php

namespace Lavakit\Translation\Repositories\Caches;

use Lavakit\Base\Repositories\Caches\CacheDecorator;
use Lavakit\Base\Services\Caches\CacheInterface;
use Lavakit\Translation\Repositories\Interfaces\TranslationRepository;

/**
 * Class TranslationCacheDecorator
 * @package Lavakit\Translation\Repositories\Caches
 * @copyright 2019 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com
 */
class TranslationCacheDecorator extends CacheDecorator implements TranslationRepository
{
    /**
     * @var TranslationRepository
     */
    protected $repository;

    /** @var CacheInterface */
    protected $cache;

    /**
     * TranslationCacheDecorator constructor.
     * @param TranslationRepository $repository
     * @param CacheInterface $cache
     */
    public function __construct(TranslationRepository $repository, CacheInterface $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
